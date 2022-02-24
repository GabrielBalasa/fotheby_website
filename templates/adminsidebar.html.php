<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="d-flex flex-column p-3 text-white bg-dark col-2" >
            <a href="/dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <span class="fs-4">Administration</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="/dashboard" class="nav-link active" aria-current="page">
                  Dashboard
                </a>
              </li>
              <li>
                <a href="/auctions/manage/active" class="nav-link text-white">
                  Active Auctions
                </a>
              </li>
              <li>
                <a href="/auctions/manage/closed" class="nav-link text-white">
                  Closed Auctions
                </a>
              </li>
              <li>
                <a href="/items/manage/pending" class="nav-link text-white">
                  Pending Items
                </a>
              </li>
              <li>
                <a href="/items/manage/active" class="nav-link text-white">
                  Active Items
                </a>
                <a href="/items/manage/sold" class="nav-link text-white">
                  Sold Items
                </a>
              </li>
              <li>
                <a href="/categories/manage" class="nav-link text-white">
                  Categories
                </a>
              </li>
              <li>
                <a href="/evaluations/manage/pending" class="nav-link text-white">
                  Pending Evaluations
                </a>
              </li>
              <li>
                <a href="/evaluations/manage/complete" class="nav-link text-white">
                  Complete Evaluations
                </a>
              </li>
              <li>
                <a href="/accounts/customer/pending" class="nav-link text-white">
                  Pending Customer Accounts
                </a>
              </li>
              <li>
                <a href="/accounts/customer/manage" class="nav-link text-white">
                  Customer Accounts
                </a>
              </li>
              <li>
                <a href="/category/save" class="nav-link text-white">
                  Create New Category
                </a>
              </li>
              <li>
                <a href="/auction/save" class="nav-link text-white">
                  Create New Auction
                </a>
              </li>
              <li>
                <a href="/item/save" class="nav-link text-white">
                  Create New Item
                </a>
              </li>
              
              <?php if($user->role >= 4){
                      echo '<li>';
                        echo '<a href="/account/save" class="nav-link text-white">';
                          echo 'Create New Account';
                        echo '</a>';
                      echo '</li>';
                      echo '<li>';
                        echo '<a href="/accounts/admin/manage" class="nav-link text-white">';
                          echo 'Admin Accounts';
                        echo '</a>';
                      echo '</li>';
                    }
              ?>
            </ul>
            <hr>
            <div class="dropdown">
              <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <strong><?=$user->firstname?> <?=$user->surname?></strong>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/logout">Sign out</a></li>
              </ul>
            </div>
          </div>