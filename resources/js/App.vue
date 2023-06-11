<template>
    <div style="position:relative">
        <ButtonGroup class="_btn_tab">
            <Button :type="$route.name === 'home' ? 'primary' : 'default'" to="/">Account head in table view</Button>
            <Button :type="$route.name === 'hierarchical' ? 'primary' : 'default'" to="/hierarchical-view">Account head in hierarchical view</Button>
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

</style>
