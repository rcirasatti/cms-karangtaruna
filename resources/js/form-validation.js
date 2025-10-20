/**
 * Form Validation Helper
 * Mencegah submit jika ada field wajib yang kosong
 * Data tetap tersimpan di form jika validasi gagal
 */

document.addEventListener('DOMContentLoaded', function() {
    // Cari semua form dengan class 'form-with-validation'
    const forms = document.querySelectorAll('form[data-validate="true"]');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
                showValidationError(this);
            }
        });
    });
});

/**
 * Validasi form sebelum submit
 */
function validateForm(form) {
    let isValid = true;
    const requiredFields = form.querySelectorAll('[required]');
    
    requiredFields.forEach(field => {
        // Skip hidden fields
        if (field.type === 'hidden') return;
        
        // Cek tipe field
        if (field.type === 'file') {
            // File validation - bisa optional jika edit mode
            // Lewati jika sudah ada file atau ada data lama
        } else if (field.tagName === 'SELECT') {
            // Validasi select (dropdown)
            if (!field.value || field.value === '') {
                isValid = false;
                field.classList.add('border-red-500', 'ring-red-100');
            } else {
                field.classList.remove('border-red-500', 'ring-red-100');
            }
        } else if (field.type === 'textarea' || field.type === 'text' || 
                   field.type === 'email' || field.type === 'number' || 
                   field.type === 'tel' || field.type === 'password') {
            // Validasi text, email, number, dll
            const value = field.value.trim();
            if (!value) {
                isValid = false;
                field.classList.add('border-red-500', 'ring-red-100');
            } else {
                field.classList.remove('border-red-500', 'ring-red-100');
            }
        }
    });
    
    return isValid;
}

/**
 * Tampilkan pesan error jika validasi gagal
 */
function showValidationError(form) {
    // Cek apakah sudah ada alert error
    let errorAlert = form.querySelector('.validation-error-alert');
    
    if (!errorAlert) {
        errorAlert = document.createElement('div');
        errorAlert.className = 'validation-error-alert bg-red-50 border-l-4 border-red-500 rounded-lg p-4 mb-6';
        errorAlert.innerHTML = `
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-semibold text-red-700">Mohon lengkapi semua field yang wajib diisi (ditandai dengan *)</p>
                </div>
            </div>
        `;
        
        // Insert di awal form
        form.insertBefore(errorAlert, form.firstChild);
        
        // Scroll ke top form
        errorAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
        // Hapus alert setelah 5 detik
        setTimeout(() => {
            errorAlert.remove();
        }, 5000);
    }
}

/**
 * Enable validation pada select/dropdown saat user mengubah value
 */
document.addEventListener('change', function(e) {
    const field = e.target;
    
    // Jika field memiliki required attribute
    if (field.hasAttribute('required')) {
        if (field.value && field.value !== '') {
            field.classList.remove('border-red-500', 'ring-red-100');
        } else {
            field.classList.add('border-red-500', 'ring-red-100');
        }
    }
});

/**
 * Enable validation pada text input saat user mengetik
 */
document.addEventListener('input', function(e) {
    const field = e.target;
    
    // Jika field memiliki required attribute dan ada red border
    if (field.hasAttribute('required') && field.classList.contains('border-red-500')) {
        const value = field.value.trim();
        if (value) {
            field.classList.remove('border-red-500', 'ring-red-100');
        }
    }
});

/**
 * Fungsi untuk disable/enable submit button based on form validity
 * Opsional: untuk UX yang lebih baik
 */
function setupFormButtonControl(formSelector = 'form[data-validate="true"]') {
    const forms = document.querySelectorAll(formSelector);
    
    forms.forEach(form => {
        const submitBtn = form.querySelector('button[type="submit"]');
        const requiredFields = form.querySelectorAll('[required]');
        
        if (!submitBtn) return;
        
        // Update button state saat input berubah
        const updateButtonState = () => {
            let allFilled = true;
            
            requiredFields.forEach(field => {
                if (field.type === 'hidden') return;
                
                const value = field.type === 'select' || field.tagName === 'SELECT' 
                    ? field.value 
                    : field.value.trim();
                
                if (!value) {
                    allFilled = false;
                }
            });
            
            if (allFilled) {
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                submitBtn.disabled = false;
            } else {
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                submitBtn.disabled = true;
            }
        };
        
        // Initial state
        updateButtonState();
        
        // Listen untuk perubahan
        requiredFields.forEach(field => {
            field.addEventListener('change', updateButtonState);
            field.addEventListener('input', updateButtonState);
        });
    });
}

// Auto-setup jika ada form dengan data-validate="true"
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        if (document.querySelector('form[data-validate="true"]')) {
            setupFormButtonControl();
        }
    });
} else {
    if (document.querySelector('form[data-validate="true"]')) {
        setupFormButtonControl();
    }
}
