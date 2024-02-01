<div>
    <header class="bg-[#2E97D4] p-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-semibold">Logo</h1>
            <nav class="space-x-4">
                <a href="#" class="hover:text-gray-300">Home</a>
                <a href="#" class="hover:text-gray-300">About</a>
                <a href="#" class="hover:text-gray-300">Services</a>
                <a href="#" class="hover:text-gray-300">Contact</a>
            </nav>
        </div>
    </header>
    <x-splade-data>
        <input v-model="data.name" />
        <p>Your name is <span v-text="data.name" /></p>
    </x-splade-data>
</div>
