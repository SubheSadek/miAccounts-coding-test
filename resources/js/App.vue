<template>
    <div class="_btn_tab">
        <ButtonGroup>
            <Button :type="$route.name === 'home' && 'primary'" to="/">Account head in table view</Button>
            <Button :type="$route.name === 'hierarchical' && 'primary'" to="/hierarchical-view">Account head in hierarchical view</Button>
        </ButtonGroup>
    </div>
    <router-view></router-view>
</template>

<script setup>
import {
    ButtonGroup,
    Button,
} from "view-ui-plus";
</script>

<style>
._btn_tab{
    position: absolute;
    left: 8%;
    top: 10%;
}
</style>
