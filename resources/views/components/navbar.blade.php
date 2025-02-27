<style>

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 80px;
        padding: 0 100px;
        background-color: rgb(0, 0, 255);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    nav .logo h2 {
        font-weight: 900;
        font-size: 1.7rem;
        color: rgba(255, 255, 255, 0.856)
    }    

    nav .navbar ul li {
        display: inline-block;
        margin: 0 5px;
    }

    nav .navbar ul li a {
        padding: 15px 20px;
    }

    nav .navbar ul li a {
        color: rgba(255, 255, 255, 0.74)
    }

    .active {
        background-color: rgb(0, 0, 141); 
        color: white;
        padding: 15px 20px;
        border-radius: 10px;
    }

    .nav2 {
        height: 60px;
        display: flex;
        align-items: center;
        padding: 0 100px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .3)
    }

    .nav2 h1 {
        font-weight: bolder;
        color: rgba(0, 0, 0, 0.623);
    }

    .btn a {
        background-color: rgba(255, 255, 255, 0.39);
        border: 1px solid white;
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        font-size: 15px;
        margin: 0 10px;
    }

</style>

<nav>
    <div class="logo">
        <h2>Enigma</h2>
    </div>
    <div class="navbar">
        <ul>
            <li><a href="/siswa" class="{{ request()->is('siswa') ? "active" : "" }}">Siswa</a></li>
            <li><a href="/barang" class="{{ request()->is('barang') ? "active" : "" }}">Barang</a></li>
            <li><a href="/peminjaman" class="{{ request()->is('peminjaman') ? "active" : "" }}">Peminjaman</a></li>
            {{-- <li><a href="/pengembalian" class="{{ request()->is('pengembalian') ? "active" : "" }}">Pengembalian</a></li> --}}
            <li><a href="/denda" class="{{ request()->is('denda') ? "active" : "" }}">Denda</a></li>
        </ul>
    </div>
    <div class="btn">
        <a href="/dashboard">Dashboard</a>
    </div>
</nav>
<div class="nav2">
    <h1>SMKN 4 Padalarang</h1>
</div>