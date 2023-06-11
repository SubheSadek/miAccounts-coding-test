import { callApi } from "../../../Helpers/callApi";
import { useMainStore } from "../../../store";
import { reactive } from "vue";

export const useHierarchicalViewData = () => {
    const storeMain = useMainStore();

    const params = reactive({
        limit: 10,
        page: 1,
    });
    const getHierarchicalViewData = async () => {
        const res = await callApi(
            "get",
            "/account-heads/in-hierarchical-view",
            params,
            "params"
        );
        if (res.data.success) {
            storeMain.setAccountHierarchicalData(res.data.json_data);
        }
    };

    return {
        storeMain,
        params,
        getHierarchicalViewData,
    };
};
