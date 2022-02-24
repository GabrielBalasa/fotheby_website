<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/home">Fotheby's</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/auctions">Auctions</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/items">Catalogue</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/search" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach($categories as $category):  ?>
                        <li><a class="dropdown-item" href="/items/list/category?id=<?=$category->id?>"><?=$category->title?></a><li>
                    <?php endforeach ?>
                    </ul>
                
                    <li class="nav-item">
                    <a class="nav-link" href="/about">About us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/evaluation/book">Sell with us</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if ($loggedIn): ?>
                        <li class="nav-item"><a class="nav-link" href="/items/manage/active">Administration</a></li>
                        <li class="nav-item"><a class="nav-link" href="/logout">Log out</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="/login">Log in</a></li>
                        <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                    <?php endif; ?>
                        <ul>
                </div>
            </div>
        </nav>     