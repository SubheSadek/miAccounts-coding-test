import { callApi } from "../../../Helpers/callApi";
import { useMainStore } from "../../../store";
import { reactive } from "vue";

export const useTableViewData = () => {
    const storeMain = useMainStore();

    const params = reactive({
        limit: 10,
        page: 1,
    });
    const getTableViewData = async () => {
        const res = await callApi(
            "get",
            "/account-heads/in-table-view",
            params,
            "params"
        );
        if (res.data.success) {
            storeMain.setAccountTableData(res.data.json_data);
        }
    };

    return {
        storeMain,
        params,
        getTableViewData,
    };
};
