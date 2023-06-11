<template>
    <div class="card _box_shadow mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">

            <h3 class="card-title align-items-start flex-column">
                <span class="card-label  fs-3 mb-1">{{ $route.meta.title }} Table</span>
                <span class="text-muted mt-1 fw-bold fs-7">Total Records : {{ storeMain.getAccountHierarchicalData.meta?.total }}</span>
            </h3>

            <div class="d-flex align-items-center">
                <Page
                    v-if="storeMain.getAccountHierarchicalData.meta?.total"
                    @on-page-size-change="e => (params.limit = e, getHierarchicalViewData())"
                    v-model="params.page" @on-change="getHierarchicalViewData"
                    :total="storeMain.getAccountHierarchicalData.meta.total" show-sizer
                    style="text-align:center;margin-bottom: 2%;"
                />
            </div>

        </div>

        <div class="card-body py-3">

            <Row :gutter="16">

                <DataRow
                    v-for="(head) in storeMain.getAccountHierarchicalData.data"
                    :key="(head.id)" :head="head"
                />

            </Row>


        </div>


            <Page
                v-if="storeMain.getAccountHierarchicalData.meta?.total"
                @on-page-size-change="e => (params.limit = e, getHierarchicalViewData())"
                v-model="params.page" @on-change="getHierarchicalViewData"
                :total="storeMain.getAccountHierarchicalData.meta.total" show-sizer
                style="text-align:center;margin-bottom: 2%;"
            />
    </div>

</template>

<script setup>
import DataRow from "./components/DataRow.vue";
import {
    Page,
    Row
} from "view-ui-plus"



import { useHierarchicalViewData,  } from './js/accountHierarchical.js';
const {
    storeMain,
    params,
    getHierarchicalViewData
} = useHierarchicalViewData();
getHierarchicalViewData()
</script>


<style>

.card {
    margin: 6% 8% 3% 8% !important;
}

._h_row{
    padding: 5px 40px;
    background: #f5f5f5;
    border-bottom: 1px solid #dbdbdb;
}
._h_font{
    font-size: 16px !important;
}
</style>
