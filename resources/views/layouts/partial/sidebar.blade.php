<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('back/assets/img/sidebar-1.jpg')}}">
     
          <div class="logo">
            <a href="{{route('admin.dashboard')}}" class="simple-text logo-normal">
              Creative Mama
            </a>
          </div>
          <div class="sidebar-wrapper">
            <ul class="nav">
              <li class="{{Request::is('admin/dashboard*')? 'active':''}}">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="{{Request::is('admin/slider*')? 'active':''}} ">
                <a class="nav-link" href="{{route('admin.slider.index')}}">
                  <i class="material-icons">slideshow</i>
                  <p>Slider</p>
                </a>
              </li>

              <li class="{{Request::is('admin/category*')? 'active':''}}">
                <a class="nav-link" href="{{ route('admin.category.index') }}">
                  <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                  <p>Category</p>
                </a>
              </li>
              
             <li class="{{Request::is('admin/item*')? 'active':''}}">
                <a class="nav-link" href="{{ route('admin.item.index') }}">
                  <i class="fa fa-list" aria-hidden="true"></i>
                  <p>Item</p>
                </a>
              </li>
              
              <li class="{{Request::is('admin/reservation*')? 'active':''}} ">
                <a class="nav-link" href="{{ route('admin.reservation.index') }}">
                  <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  <p>Reservation</p>
                </a>
              </li>
              
              <li class="{{Request::is('admin/message*')? 'active':''}} ">
                <a class="nav-link" href="{{ route('admin.message.index') }}">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <p>Message</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                  <i class="material-icons">notifications</i>
                  <p>Notifications</p>
                </a>
              </li>
              <!-- <li class="nav-item active-pro ">
                    <a class="nav-link" href="./upgrade.html">
                        <i class="material-icons">unarchive</i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li> -->
            </ul>
          </div>
        </div>