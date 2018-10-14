<div class="site-menubar">
      <div class="site-menubar-body">
        <div>
          <div>
            <ul class="site-menu" data-plugin="menu">
              <li class="site-menu-category">Menu</li>
              <li class="site-menu-item">
                <a href="{{ route('uom.index') }}">
                  <i class="site-menu-icon ion-ios-pricetags" aria-hidden="true"></i>
                  <span class="site-menu-title">Unit of Measure</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="{{ route('motor.index') }}">
                  <i class="site-menu-icon ion-ios-pricetags" aria-hidden="true"></i>
                  <span class="site-menu-title">Motor</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="{{ route('type.index') }}">
                  <i class="site-menu-icon ion-ios-pricetags" aria-hidden="true"></i>
                  <span class="site-menu-title">Motor Type</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="{{ route('merk.index') }}">
                  <i class="site-menu-icon ion-ios-pricetags" aria-hidden="true"></i>
                  <span class="site-menu-title">Merk</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="{{ route('categories.index') }}">
                  <i class="site-menu-icon ion-ios-pricetags" aria-hidden="true"></i>
                  <span class="site-menu-title">Categories</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="{{ route('product.index') }}">
                  <i class="site-menu-icon ion-ios-pricetags" aria-hidden="true"></i>
                  <span class="site-menu-title">Product</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="{{ route('suppliers.index') }}">
                  <i class="site-menu-icon ion-ios-pricetags" aria-hidden="true"></i>
                  <span class="site-menu-title">Suplliers</span>
                </a>
              </li>
              <li class="site-menu-item">
                <a href="{{ route('purchase.index') }}">
                  <i class="site-menu-icon ion-ios-pricetags" aria-hidden="true"></i>
                  <span class="site-menu-title">Purchase</span>
                </a>
              </li>
              @can('user-list')
              <li class="site-menu-item">
                <a href="{{ route('users.index') }}">
                  <i class="site-menu-icon wb-users" aria-hidden="true"></i>
                  <span class="site-menu-title">User Admin</span>
                </a>
              </li>
              @endcan
              @can('role-list')
              <li class="site-menu-item">
                <a href="{{ route('roles.index')}}">
                  <i class="site-menu-icon wb-settings" aria-hidden="true"></i>
                  <span class="site-menu-title">Roles</span>
                </a>
              </li>
              @endcan
            </ul>
          </div>
        </div>
      </div>
    
      <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
          data-original-title="Settings">
          <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
          <span class="icon wb-eye-close" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
          <span class="icon wb-power" aria-hidden="true"></span>
        </a>
      </div></div>    <div class="site-gridmenu">
      <div>
        <div>
          <ul>
            <li>
              <a href="apps/mailbox/mailbox.html">
                <i class="icon wb-envelope"></i>
                <span>Mailbox</span>
              </a>
            </li>
            <li>
              <a href="apps/calendar/calendar.html">
                <i class="icon wb-calendar"></i>
                <span>Calendar</span>
              </a>
            </li>
            <li>
              <a href="apps/contacts/contacts.html">
                <i class="icon wb-user"></i>
                <span>Contacts</span>
              </a>
            </li>
            <li>
              <a href="apps/media/overview.html">
                <i class="icon wb-camera"></i>
                <span>Media</span>
              </a>
            </li>
            <li>
              <a href="apps/documents/categories.html">
                <i class="icon wb-order"></i>
                <span>Documents</span>
              </a>
            </li>
            <li>
              <a href="apps/projects/projects.html">
                <i class="icon wb-image"></i>
                <span>Project</span>
              </a>
            </li>
            <li>
              <a href="apps/forum/forum.html">
                <i class="icon wb-chat-group"></i>
                <span>Forum</span>
              </a>
            </li>
            <li>
              <a href="index.html">
                <i class="icon wb-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>