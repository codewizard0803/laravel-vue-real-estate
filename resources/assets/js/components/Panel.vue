<template>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel">
            <div class="panel-heading">
                <slot name="header"></slot>
            </div>
            <div class="panel-body">
                <slot name="body" />
            </div>
        </div>
    </div>
</template>