/**
 * File Upload Validator
 * Memvalidasi ukuran file sebelum upload
 */

const FileUploadValidator = {
    // Konfigurasi ukuran max (dalam bytes)
    config: {
        maxSize: 5 * 1024 * 1024, // 5MB default
        maxSizePerFile: 5 * 1024 * 1024, // 5MB per file
        maxTotalSize: 50 * 1024 * 1024, // 50MB total untuk multiple upload
        allowedTypes: ['image/jpeg', 'image/png', 'image/gif', 'image/webp']
    },

    /**
     * Format bytes ke readable format (KB, MB, GB)
     */
    formatBytes(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
    },

    /**
     * Validasi single file
     */
    validateSingleFile(file, maxSize = this.config.maxSize) {
        if (!file) {
            return { valid: true };
        }

        // Cek tipe file
        if (!this.config.allowedTypes.includes(file.type)) {
            return {
                valid: false,
                error: `Format file tidak didukung. Hanya JPEG, PNG, GIF, dan WebP yang diizinkan.`
            };
        }

        // Cek ukuran file
        if (file.size > maxSize) {
            return {
                valid: false,
                error: `Ukuran file terlalu besar! ${this.formatBytes(file.size)} > ${this.formatBytes(maxSize)}. Silakan pilih file yang lebih kecil.`
            };
        }

        return { valid: true };
    },

    /**
     * Validasi multiple files
     */
    validateMultipleFiles(files, maxPerFile = this.config.maxSizePerFile, maxTotal = this.config.maxTotalSize) {
        if (!files || files.length === 0) {
            return { valid: true };
        }

        const errors = [];
        let totalSize = 0;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            totalSize += file.size;

            // Validasi per file
            const fileValidation = this.validateSingleFile(file, maxPerFile);
            if (!fileValidation.valid) {
                errors.push(`File ${i + 1} (${file.name}): ${fileValidation.error}`);
            }

            // Cek tipe file
            if (!this.config.allowedTypes.includes(file.type)) {
                errors.push(`File ${i + 1} (${file.name}): Format tidak didukung.`);
            }
        }

        // Cek total size
        if (totalSize > maxTotal) {
            errors.push(`Total ukuran file terlalu besar! ${this.formatBytes(totalSize)} > ${this.formatBytes(maxTotal)}. Silakan kurangi jumlah file.`);
        }

        if (errors.length > 0) {
            return {
                valid: false,
                error: errors.join('\n')
            };
        }

        return { valid: true };
    },

    /**
     * Setup validasi untuk input file dengan alert
     */
    setupFileInput(inputSelector, options = {}) {
        const input = document.querySelector(inputSelector);
        if (!input) return;

        const isMultiple = input.hasAttribute('multiple');
        const maxPerFile = options.maxPerFile || this.config.maxSizePerFile;
        const maxTotal = options.maxTotal || this.config.maxTotalSize;

        input.addEventListener('change', (e) => {
            const files = e.target.files;

            if (files.length === 0) return;

            let validation;
            if (isMultiple) {
                validation = this.validateMultipleFiles(files, maxPerFile, maxTotal);
            } else {
                validation = this.validateSingleFile(files[0], maxPerFile);
            }

            if (!validation.valid) {
                alert('❌ Gagal Upload\n\n' + validation.error);
                e.target.value = ''; // Reset input
            } else {
                // Optional: show success message
                if (isMultiple) {
                    console.log(`✓ ${files.length} file valid. Total: ${this.formatBytes(Array.from(files).reduce((sum, f) => sum + f.size, 0))}`);
                } else {
                    console.log(`✓ File valid. Ukuran: ${this.formatBytes(files[0].size)}`);
                }
            }
        });
    },

    /**
     * Setup validasi untuk semua input file di halaman
     */
    setupAllFileInputs(options = {}) {
        const fileInputs = document.querySelectorAll('input[type="file"][accept*="image"]');
        fileInputs.forEach(input => {
            this.setupFileInputForElement(input, options);
        });
    },

    /**
     * Setup validasi untuk element spesifik
     */
    setupFileInputForElement(element, options = {}) {
        const isMultiple = element.hasAttribute('multiple');
        const maxPerFile = options.maxPerFile || this.config.maxSizePerFile;
        const maxTotal = options.maxTotal || this.config.maxTotalSize;

        element.addEventListener('change', (e) => {
            const files = e.target.files;

            if (files.length === 0) return;

            let validation;
            if (isMultiple) {
                validation = this.validateMultipleFiles(files, maxPerFile, maxTotal);
            } else {
                validation = this.validateSingleFile(files[0], maxPerFile);
            }

            if (!validation.valid) {
                alert('❌ Gagal Upload\n\n' + validation.error);
                e.target.value = ''; // Reset input
            }
        });
    }
};

// Export untuk digunakan
export default FileUploadValidator;
