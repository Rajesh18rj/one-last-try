<div class="grid sm:grid-cols-2 gap-7 mb-12">

    @foreach ($topics as $topic => $data)
        @php

            $color = $topicColors[$topic] ?? [
            'bg' => 'from-gray-50 to-gray-100',
            'icon' => 'from-gray-400 to-gray-600',
            'text' => 'text-gray-800',
            'progress' => 'from-gray-400 to-gray-600',
            ];

        @endphp

        @if ($topic === 'ikigai')
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50
border border-indigo-100
rounded-3xl p-8 text-center shadow-md">

                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl

bg-gradient-to-br from-indigo-500 to-purple-500

flex items-center justify-center
shadow-[0_10px_25px_rgba(99,102,241,0.35)]">

                    <i class="fa-solid fa-compass text-white text-xl"></i>

                </div>

                <h3 class="font-bold text-indigo-800 mb-2">
                    Ikigai Insight
                </h3>

                <p class="text-indigo-700 text-sm">
                    Based on your responses, you can discover your Ikigai and understand what drives you.                </p>

            </div>
        @else
            <div class="bg-gradient-to-br {{ $color['bg'] }}

border border-white/60
rounded-3xl
p-7

shadow-sm
hover:shadow-xl

transition-all duration-300

hover:-translate-y-1
hover:scale-[1.02]">

                <div class="flex items-center gap-4 mb-4">

                    <div class="w-12 h-12 rounded-2xl

bg-gradient-to-br {{ $color['icon'] }}

flex items-center justify-center

shadow-[0_8px_20px_rgba(0,0,0,0.15)]">

                        <i class="fa-solid {{ $topicIcons[$topic] ?? 'fa-circle' }}
text-white text-lg"></i>

                    </div>

                    <h3 class="font-bold {{ $color['text'] }} capitalize text-lg">

                        {{ ucwords(str_replace('_', ' ', $topic)) }}

                    </h3>

                </div>

                <div class="flex justify-between items-center mb-4">

                        <span class="text-xs font-bold px-3 py-1 rounded-xl

                                        @if ($data['level'] == 'Excellent') bg-emerald-100 text-emerald-700
                                        @elseif($data['level'] == 'Good')
                                        bg-blue-100 text-blue-700
                                        @elseif($data['level'] == 'Moderate')
                                        bg-amber-100 text-amber-700
                                        @else
                                        bg-red-100 text-red-600 @endif">

                            {{ $data['level'] }}

                        </span>

                    <span class="font-bold {{ $color['text'] }}
                                    bg-white/70 px-3 py-1 rounded-lg shadow-sm">

                            {{ $data['percentage'] }}%

                        </span>

                </div>

                <div class="w-full h-3 bg-white/60
                                    rounded-full mb-4">

                    <div class="h-3 rounded-full

                                    bg-gradient-to-r {{ $color['progress'] }}

                                    shadow-[0_0_10px_rgba(0,0,0,0.15)]

                                    transition-all duration-700" style="width:{{ $data['percentage'] }}%">
                    </div>

                </div>

                <p class="text-sm {{ $color['text'] }} leading-relaxed">

                    💡 {{ $topicTips[$topic][$data['level']] ?? 'Small mindful steps help growth.' }}

                </p>

            </div>
        @endif
    @endforeach

</div>
