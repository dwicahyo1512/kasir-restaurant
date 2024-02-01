<script>
import { defineComponent, inject } from "vue";
import {
    NConfigProvider,
    NInput,
    NDatePicker,
    NSpace,
    NButton,
    NCard,
} from "naive-ui";
// theme
import { createTheme, inputDark, datePickerDark } from "naive-ui";
// locale & dateLocale
import { zhCN, dateZhCN } from "naive-ui";
import { SidebarMenu } from "vue-sidebar-menu";
import "vue-sidebar-menu/dist/vue-sidebar-menu.css";
export default defineComponent({
    data() {
        return {
            menu: [
                {
                    href: "/dashboard",
                    header: "Main Navigation",
                    hiddenOnCollapse: true,
                },
                {
                    href: "/",
                    title: "Dashboard",
                    icon: "fa fa-user",
                },
                {
                    title: "Charts",
                    icon: "fa fa-chart-area",
                    child: [
                        {
                            title: "Sub Link",
                        },
                    ],
                },
            ],
        };
    },
    components: {
        NConfigProvider,
        NInput,
        NDatePicker,
        NSpace,
        NButton,
        NCard,
        SidebarMenu,
    },
    setup() {
        return {
            darkTheme: createTheme([inputDark, datePickerDark]),
            zhCN,
            dateZhCN,
        };
    },
});
</script>

<template>
    <n-config-provider
        :theme="darkTheme"
        :locale="zhCN"
        :date-locale="dateZhCN"
    >
        <sidebar-menu :menu="menu"> </sidebar-menu>
    </n-config-provider>
</template>

<style>
body {
    background: black;
}
</style>
