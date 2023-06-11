import { defineStore } from "pinia";

const authUser = window.authUser ? window.authUser : null;
export const useMainStore = defineStore({
    id: "main",
    state: () => ({
        accountHierarchicalData: [],
        accountTableData: [],
    }),

    getters: {
        getAccountHierarchicalData: (state) => {
            return state.accountHierarchicalData;
        },
        getAccountTableData: (state) => {
            return state.accountTableData;
        },
    },

    actions: {
        setAccountHierarchicalData(data) {
            this.accountHierarchicalData = data;
        },
        setAccountTableData(data) {
            this.accountTableData = data;
        },
    },
});
