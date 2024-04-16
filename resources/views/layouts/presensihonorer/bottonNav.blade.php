<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="/panelhonorer/dashboardhonorer" class="item {{ request()->is('dashboard') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong>Home</strong>
        </div>
    </a>
    <a href="/presensihonorer/histori" class="item {{ request()->is('presensihonorer/histori') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="newspaper-outline"></ion-icon>
            <strong>Histori</strong>
        </div>
    </a>
    <a href="/presensihonorer/create" class="item {{ request()->is('presensihonorer/create') ? 'active' : '' }}">
        <div class="col">
            <div class="action-button large">
                <ion-icon name="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="/presensihonorer/izin" class="item {{ request()->is('presensihonorer/izin') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-outline"></ion-icon>
            <strong>Izin</strong>
        </div>
    </a>
    <a href="/editprofile" class="item {{ request()->is('editprofile') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->
