<div x-data="{height: 0, chatDiv: document.getElementById('conversation')}"
x-init="height=chatDiv.scrollHeight,
$nextTick(() => chatDiv.scrollTop = height);"
@scroll-bottom.window="$nextTick(() => chatDiv.scrollTop = height)">
    <div class="max-w-md mx-auto bg-white rounded">
        <!-- Chat messages container -->
        <div class="mb-4 h-48 overflow-y-auto" id="conversation">
          @foreach ($messages as $message)
          @php
            $isMine = $message->user_id === auth()->id();
          @endphp
          <div class="flex {{ $isMine ? "items-end justify-end" : "items-start"}}  mb-2">
            <div class="flex-shrink-0">
              <img src="https://placekitten.com/40/40" alt="User Avatar" class="w-8 h-8 rounded-full">
            </div>
            <div class="ml-3 {{ $isMine ? "bg-blue-400" : "bg-blue-100"}} p-2 rounded-lg">
              <p class="text-sm text-gray-700">{{ $message->message }}</p>
              <p class="text-xs text-gray-700">{{ $message->created_at }}</p>
            </div>
          </div>
          @endforeach
          <!-- Add more messages as needed -->
        </div>
    
        <!-- Input field and send button -->
        <form wire:submit.prevent="sendMessage">
          <div class="flex items-center">
            <input type="text" wire:model="message" placeholder="Type your message..." class="flex-1 px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none">
            <button class="px-4 py-2 bg-blue-500 text-white rounded-r-md hover:bg-blue-600 focus:outline-none">Send</button>
          </div>
        </form>
    </div>
</div>
