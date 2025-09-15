<template>
    <div class="spinner-border" role="status">
        <div class="spinner-border-inner"></div>
    </div>
</template>
<style scoped>
.spinner-border {
    position: relative;
    width: 18px;
    height: 18px;
}
.spinner-border .spinner-border-inner {
    display: block;
    width: 100%;
    height: 100%;
    border: solid 3px #222;
    border-left-color: transparent;
    border-radius: 50%;
    animation: spinner-border 0.75s linear infinite;
}

@keyframes spinner-border {
    100% {
        transform: rotate(360deg);
    }
}
</style>
