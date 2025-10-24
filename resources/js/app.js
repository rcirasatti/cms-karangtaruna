import './bootstrap';
import FileUploadValidator from './file-upload-validator';

// Setup file upload validation on page load
document.addEventListener('DOMContentLoaded', () => {
    FileUploadValidator.setupAllFileInputs();
});

// Expose to window for inline scripts
window.FileUploadValidator = FileUploadValidator;
