<div class="nav flex-column navTabsLeft" aria-orientation="vertical" >
    <a v-on:click="getFilter" href="" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-filter="id">
        Order by id <i class="fal fa-tachometer-alt"></i>
    </a>
    <a v-on:click="getFilter" href="" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-filter="name">
        Order by name <i class="fal fa-user"></i>
    </a>
    <a v-on:click="getFilter" href="" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" data-filter="description">
        Order by description <i class="fal fa-file-signature"></i>
    </a>
</div>
