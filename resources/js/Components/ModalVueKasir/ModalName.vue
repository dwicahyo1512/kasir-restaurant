<script>
export default {
    props: {
        show: Boolean,
        isLoading: Boolean,
    },
};
</script>
<template>
    <transition name="modal">
        <div
            v-if="show"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        >
            <div class="bg-base-300 rounded-lg shadow-lg w-1/2 p-6">
                <div class="modal-header">
                    <slot name="header">default header</slot>
                </div>

                <div class="modal-body">
                    <slot name="body">default body</slot>
                </div>

                <div
                    class="modal-footer mt-4 flex flex-col md:flex-row md:justify-end"
                >
                    <slot name="footer">
                        <button
                            class="btn btn-accent mr-0 mb-2 md:mr-2 md:mb-0"
                            @click="$emit('yes')"
                            :disabled="isLoading"
                        >
                            <span
                                v-if="isLoading"
                                class="loading loading-spinner loading-md text-success"
                            ></span>
                            <span v-else>Lanjutkan, Payment</span>
                        </button>
                        <button class="btn btn-neutral" @click="$emit('close')">
                            Batalkan, Payment
                        </button>
                    </slot>
                </div>
            </div>
        </div>
    </transition>
</template>

<style>
/* The following styles are auto-applied to elements with
   * transition="modal" when their visibility is toggled
   * by Vue.js.
   *
   * You can easily play with the modal transition by editing
   * these styles.
   */

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}

.modal-enter-from .bg-white,
.modal-leave-to .bg-white {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
