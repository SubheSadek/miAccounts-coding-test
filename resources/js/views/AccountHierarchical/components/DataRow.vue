<template>
    <Col span="24">

        <Row class="_h_row">
    
            <Col span="16">
                <div class="d-flex align-items-center">
                    <div class="d-flex justify-content-start flex-column">
                        <a href="javascript:void(0)" class="text-dark _disable_link text-hover-primary mb-1 _h_font">
                            {{ head.name }}
                        </a>
                    </div>
                </div>
            </Col>

            <Col span="8">
                <div class="d-flex align-items-center">
                    <div class="d-flex justify-content-start flex-column">
                        <a href="javascript:void(0)" class="text-dark _disable_link text-hover-primary mb-1 _h_font">
                            Tk. {{ head.total }}
                        </a>
                    </div>
                </div>
            </Col>

        
        </Row>
        
        <Row class="_h_row" v-for="childHead in head.child" :key="childHead.id">
    
            <Col span="16" class="_h_pl_7">
                <div class="d-flex align-items-center">
                    <div class="d-flex justify-content-start flex-column">
                        <a href="javascript:void(0)" class="text-dark _disable_link text-hover-primary mb-1 _h_font">
                            {{ childHead.name }}
                        </a>
                    </div>
                </div>
            </Col>

            <Col span="8">
                <div class="d-flex align-items-center">
                    <div class="d-flex justify-content-start flex-column">
                        <a href="javascript:void(0)" class="text-dark _disable_link text-hover-primary mb-1 _h_font">
                            Tk. {{ childHead.total }}
                        </a>
                    </div>
                </div>
            </Col>

            <Col span="24">

                <Row v-for="childSubHead in childHead.child" :key="childSubHead.id" class="_h_b_top">
    
                    <Col span="16" class="_h_pl_14">
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="javascript:void(0)" class="text-dark _disable_link text-hover-primary mb-1 _h_font">
                                    {{ childSubHead.name }}
                                </a>
                            </div>
                        </div>
                    </Col>

                    <Col span="8">
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-start flex-column">
                                <a href="javascript:void(0)" class="text-dark _disable_link text-hover-primary mb-1 _h_font">
                                    Tk. {{ childSubHead.total }}
                                </a>
                            </div>
                        </div>
                    </Col>
            
                </Row>

            </Col>
        
        </Row>



    </Col>
</template>

<script setup>
import {
    Row,
    Col
} from "view-ui-plus"

const props = defineProps(['head']);
// console.log(props.head)
</script>

<style>
._h_pl_7{
    padding-left: 7% !important;
}
._h_pl_14{
    padding-left: 14%;
}

._h_b_top{
    border-top: 1px solid #dbdbdb;
}
</style>