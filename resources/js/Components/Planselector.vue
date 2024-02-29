<template>
    <div class="flex flex-row justify-center space-x-4">
        <label
            class="w-64 cursor-pointer rounded-md shadow-sm bg-white border-2 py-8 px-4"
            :class="{
                'border-white': form.plan !== 'basic',
                'border-green-500': form.plan === 'basic',
            }">
            <input type="radio" value="basic" v-model="form.plan" class="sr-only" />
            <div class="flex flex-row justify-between items-center">
                <span class="font-bold">Plan Basic</span>

                <svg v-show="form.plan === 'basic'" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <span class="text-sm">$ 9.99 / month</span>
        </label>

        <label
            class="w-64 cursor-pointer rounded-md shadow-sm bg-white border-2 py-8 px-4"
            :class="{
                'border-white': form.plan !== 'pro',
                'border-green-500': form.plan === 'pro',
            }">
            <input type="radio" value="pro" v-model="form.plan" class="sr-only" />
            <div class="flex flex-row justify-between items-center">
                <span class="font-bold">Plan Pro</span>

                <svg v-show="form.plan === 'pro'" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <span class="text-sm">$ 19.99 / month</span>
        </label>
    </div>
</template>

<script setup>
defineProps({
    form: {
        type: Object,
        required: true,
    },
});
</script>
