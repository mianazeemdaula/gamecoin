<div x-data="{height: 0, chatDiv: document.getElementById('conversation')}"
x-init="height=chatDiv.scrollHeight,
$nextTick(() => chatDiv.scrollTop = height);"
@scroll-bottom.window="$nextTick(() => chatDiv.scrollTop = height)" class="">
    <div class="mx-auto bg-white rounded shadow-lg">
        <!-- Chat messages container -->
        <div class="mb-4 h-96 overflow-y-auto border-b" id="conversation">
          @foreach ($messages as $message)
          @php
            $isMine = $message->user_id === auth()->id();
          @endphp
          <div class="flex {{ $isMine ? "items-end justify-end" : "items-start"}}  mb-2 px-2">
            <div class="flex-shrink-0">
              <img src="https://placekitten.com/40/40" alt="User Avatar" class="w-8 h-8 rounded-full">
            </div>
            <div>
              <div class="ml-3 {{ $isMine ? "bg-blue-400" : "bg-blue-100"}} p-2 rounded-lg">
                <p class="text-sm text-gray-700">{{ $message->message }}</p>
              </div>
              <p class="text-xs text-gray-700">{{ $message->created_at }}</p>
            </div>
          </div>
          @endforeach
          <!-- Add more messages as needed -->
        </div>

        <!-- Input field and send button -->
        <form wire:submit.prevent="sendMessage">
          <div class="flex items-center space-x-3 justify-between px-4">
            <input type="text" wire:model="message" placeholder="Type your message..." class="px-4 py-2 focus:border-none">
            <div class="flex space-x-4">
              <div>
                <i class="fas fa-paperclip"></i>
              </div>
              <button class="">
                <i class="fas fa-paper-plane"></i>
              </button>
            </div>
          </div>
        </form>
    </div>
</div>
