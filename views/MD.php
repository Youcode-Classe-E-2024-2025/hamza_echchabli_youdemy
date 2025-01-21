<div id="frame-player" class="hidden fixed inset-0 w-full h-[100%] bg-black bg-opacity-75 z-50 flex items-center justify-center">
    <div class="relative w-full h-full max-w-6xl mx-auto p-4 flex flex-col items-center justify-center">
        <button class="absolute top-4 right-0 text-white hover:text-gray-300 text-xl" onclick="hideDoc()">
            <i class="fas fa-times"></i>
        </button>
        <div class="bg-white rounded-lg shadow-lg p-4 w-full h-screen overflow-auto">
            <iframe id="doc-iframe" class="w-full h-full" srcdoc="<?php echo htmlentities($md_content_html); ?>"></iframe>
        </div>
    </div>
</div>
