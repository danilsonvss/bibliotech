@php
    $types = [
        'success' => [
            'color' => 'green',
            'icon' => 'components.icons.success',
        ],
        'error' => [
            'color' => 'red',
            'icon' => 'components.icons.error',
        ],
        'warning' => [
            'color' => 'yellow',
            'icon' => 'components.icons.warning',
        ],
        'info' => [
            'color' => 'blue',
            'icon' => 'components.icons.info',
        ],
    ];
@endphp

@isset($type)
    <div x-init="startTimer()" x-show="show" x-transition @mouseenter="pause" @mouseleave="resume"
        class="fixed left-2 right-2 top-[60px] sm:left-auto z-50 sm:max-w-sm bg-{{ $types[$type]['color'] }}-100 text-{{ $types[$type]['color'] }}-800 rounded-lg shadow-lg overflow-hidden"
        role="alert" x-data="{
            show: true,
            progress: 100,
            interval: null,
            isPaused: false,
            startTimer() {
                this.interval = setInterval(() => {
                    if (!this.isPaused) {
                        if (this.progress <= 0) {
                            this.show = false;
                            clearInterval(this.interval);
                        } else {
                            this.progress -= 1;
                        }
                    }
                }, 40); // 4s total (100 steps * 40ms)
            },
            pause() {
                this.isPaused = true;
            },
            resume() {
                this.isPaused = false;
            }
        }">

        <div class="flex items-start p-4 gap-3">
            {{-- Icone --}}
            @component($types[$type]['icon'])
            @endcomponent

            {{-- Mensagem --}}
            <div class="flex-1 text-sm">
                {{  $message ?? $slot }}
            </div>

            {{-- Fechar --}}
            <button @click="show = false" class="ml-2 hover:opacity-75">
                <x-icons.close />
            </button>
        </div>

        {{-- Barra de progresso regressiva --}}
        @php
            $barBase = match ($types[$type]['color']) {
                'green' => 'bg-green-300',
                'red' => 'bg-red-300',
                'yellow' => 'bg-yellow-300',
                'blue' => 'bg-blue-300',
                default => 'bg-gray-300',
            };

            $barFill = match ($types[$type]['color']) {
                'green' => 'bg-green-600',
                'red' => 'bg-red-600',
                'yellow' => 'bg-yellow-600',
                'blue' => 'bg-blue-600',
                default => 'bg-gray-600',
            };
        @endphp

        <div class="h-1 {{ $barBase }}">
            <div class="h-full {{ $barFill }} transition-all duration-40" :style="{ width: progress + '%' }">
            </div>
        </div>
    </div>
@endisset
