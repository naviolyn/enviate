<div class="p-2">
    @if(count($notifications) > 0)
        <ul class="space-y-1">
            @foreach($notifications as $notification)
            <li class="flex items-center gap-2 pb-2 border-b border-gray-300 text-justify text-s">
                <span class="text-blue-500">
                    🔔
                </span>
                <p class="text-white">
                    {{ $notification->message }}
                    <br>
                    <span class="text-xs text-gray-400">Received on: {{ $notification->created_at->format('d-m-Y H:i') }}</span>
                </p>
            </li>
            @endforeach
        </ul>
    @else
        <p class="text-white text-lg">No notifications</p>
    @endif
</div>
