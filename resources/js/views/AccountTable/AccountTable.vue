<template>
    <div class="card _box_shadow mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">

            <h3 class="card-title align-items-start flex-column">
                <span class="card-label  fs-3 mb-1">{{ $route.meta.title }} Table</span>
                <span class="text-muted mt-1 fw-bold fs-7">Total Records : {{ storeMain.getAccountTableData.meta?.total }}</span>
            </h3>

            <div class="d-flex align-items-center"></div>

        </div>

        <div class="card-body py-3">

            <div class="table-responsive">

                <Transition>
 <!-- v-if="!storeMain.dataLoading" -->
                    <table class="table table-striped align-middle gs-0 gy-4">

                        <thead>

                            <tr class="fw-bolder text-white bg-primary">
                                <th class="ps-4 min-w-50px">Acc Head id</th>
                                <th class="min-w-150px">G. Lvl 1</th>
                                <th class="min-w-80px">G. Lvl 2</th>
                                <th class="min-w-100px">G. Lvl 3</th>
                                <th class="min-w-50px">Total</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr v-for="(head) in storeMain.getAccountTableData.data" :key="(head.id)">

                                <td>
                                    <TableRow :value="head.id" />
                                </td>

                                <td>
                                    <TableRow :value="head.parent.name" />
                                </td>

                                <td>
                                    <TableRow :value="head.name" />
                                </td>

                                <td>
                                    <TableRow v-if="head.parent?.parent" :value="head.parent?.parent.name" />
                                    <TableRow v-else :value="''" />
                                </td>

                                <td>
                                    <TableRow :value="'Tk. ' + head.total" />
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </Transition>

                <div v-if="!storeMain.getAccountTableData.meta?.total" class="no_data">
                    <h2>No Data Available</h2>
                </div>


            </div>
        </div> 

        <Page 
            v-if="storeMain.getAccountTableData.meta?.total" 
            @on-page-size-change="e => (params.limit = e, getTableViewData())"
            v-model="params.page" @on-change="getTableViewData" 
            :total="storeMain.getAccountTableData.meta.total" show-sizer
            style="text-align:center;margin-bottom: 2%;" 
        />

    </div>

</template>

<script setup>

import {
    Page
} from "view-ui-plus"
import TableRow from "../../Helpers/components/TableRow.vue";
import { useTableViewData,  } from './js/accountTable.js';
const {
    storeMain,
    params,
    getTableViewData
} = useTableViewData();
getTableViewData()
</script>


<style>

.card {
    margin: 6% 8% 3% 8% !important;
}

</style>
