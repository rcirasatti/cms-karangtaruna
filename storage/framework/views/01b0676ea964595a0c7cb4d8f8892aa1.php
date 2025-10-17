<!-- Global Alert Component -->
<div x-data="{ 
    alerts: [],
    show: false,
    addAlert(type, message, duration = 5000) {
        const id = Math.random();
        this.alerts.push({ id, type, message });
        this.show = true;
        
        if (duration > 0) {
            setTimeout(() => {
                this.alerts = this.alerts.filter(alert => alert.id !== id);
                if (this.alerts.length === 0) this.show = false;
            }, duration);
        }
    },
    removeAlert(id) {
        this.alerts = this.alerts.filter(alert => alert.id !== id);
        if (this.alerts.length === 0) this.show = false;
    }
}" 
@alert.window="addAlert($event.detail.type, $event.detail.message, $event.detail.duration || 5000)"
class="fixed top-6 right-6 z-[100] space-y-4 max-w-md">
    <template x-for="alert in alerts" :key="alert.id">
        <div x-show="show"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="translate-x-full opacity-0"
             x-transition:enter-end="translate-x-0 opacity-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="translate-x-0 opacity-100"
             x-transition:leave-end="translate-x-full opacity-0"
             :class="alert.type === 'success' ? 'bg-green-50 border-l-4 border-green-500 text-green-700' : 
                      alert.type === 'error' ? 'bg-red-50 border-l-4 border-red-500 text-red-700' :
                      alert.type === 'warning' ? 'bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700' :
                      'bg-blue-50 border-l-4 border-blue-500 text-blue-700'"
             class="rounded-lg shadow-lg p-4 flex items-start justify-between space-x-4">
            
            <div class="flex items-start space-x-3 flex-1">
                <!-- Icon -->
                <div class="flex-shrink-0 pt-0.5">
                    <template x-if="alert.type === 'success'">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </template>
                    <template x-if="alert.type === 'error'">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </template>
                    <template x-if="alert.type === 'warning'">
                        <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0 4v2M12 3a9 9 0 100 18 9 9 0 000-18z"></path>
                        </svg>
                    </template>
                    <template x-if="alert.type === 'info'">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </template>
                </div>

                <!-- Message -->
                <div>
                    <p class="font-semibold text-sm mb-0.5" x-text="`Berhasil`" x-show="alert.type === 'success'"></p>
                    <p class="font-semibold text-sm mb-0.5" x-text="`Gagal`" x-show="alert.type === 'error'"></p>
                    <p class="font-semibold text-sm mb-0.5" x-text="`Peringatan`" x-show="alert.type === 'warning'"></p>
                    <p class="font-semibold text-sm mb-0.5" x-text="`Informasi`" x-show="alert.type === 'info'"></p>
                    <p class="text-sm" x-text="alert.message"></p>
                </div>
            </div>

            <!-- Close Button -->
            <button @click="removeAlert(alert.id)"
                    :class="alert.type === 'success' ? 'hover:bg-green-100 text-green-500' : 
                             alert.type === 'error' ? 'hover:bg-red-100 text-red-500' :
                             alert.type === 'warning' ? 'hover:bg-yellow-100 text-yellow-500' :
                             'hover:bg-blue-100 text-blue-500'"
                    class="flex-shrink-0 rounded-md p-1 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </template>
</div>
<?php /**PATH D:\Magang\cms-karangtaruna\resources\views/admin/layouts/alert.blade.php ENDPATH**/ ?>