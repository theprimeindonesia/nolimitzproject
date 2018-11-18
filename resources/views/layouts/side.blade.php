<style type="text/css">
  .site-menu-icon{
    font-size: 19px;
  }
</style>
<div class="site-menubar">
  <div class="site-menubar-body">
    <div>
      <div>
        <ul class="site-menu" data-plugin="menu">
          <li class="site-menu-category">Menu</li>
          <li class="site-menu-item has-sub {{ Request::is([
            'admin/uom', 'admin/uom/*'
            , 'admin/motor', 'admin/motor/*'
            , 'admin/type', 'admin/type/*'
            , 'admin/merk', 'admin/merk/*'
            , 'admin/categories', 'admin/categories/*'
            , 'admin/suppliers', 'admin/suppliers/*'
            , 'admin/expeditions', 'admin/expeditions/*'
            , 'admin/shipping', 'admin/shipping/*'
            , 'admin/payments', 'admin/payments/*'
            ]) ? 'active open':''}}">
            <a href="javascript:void(0)">
              <i class="site-menu-icon fa-database" aria-hidden="true"></i>
              <span class="site-menu-title">Datamaster</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item {{ Request::is(['admin/uom', 'admin/uom/*']) ? 'active':''}}">
                <a href="{{ route('uom.index') }}">
                  <span class="site-menu-title">Unit of Measure</span>
                </a>
              </li>
              <li class="site-menu-item {{ Request::is(['admin/motor', 'admin/motor/*']) ? 'active':''}}">
                <a href="{{ route('motor.index') }}">
                  <span class="site-menu-title">Motor</span>
                </a>
              </li>
              <li class="site-menu-item {{ Request::is(['admin/type', 'admin/type/*']) ? 'active':''}}">
                <a href="{{ route('type.index') }}">
                  <span class="site-menu-title">Motor Type</span>
                </a>
              </li>
              <li class="site-menu-item {{ Request::is(['admin/merk', 'admin/merk/*']) ? 'active':''}}">
                <a href="{{ route('merk.index') }}">
                  <span class="site-menu-title">Merk</span>
                </a>
              </li>
              <li class="site-menu-item {{ Request::is(['admin/categories', 'admin/categories/*']) ? 'active':''}}">
                <a href="{{ route('categories.index') }}">
                  <span class="site-menu-title">Categories</span>
                </a>
              </li>
              <li class="site-menu-item {{ Request::is(['admin/suppliers', 'admin/suppliers/*']) ? 'active':''}}">
                <a href="{{ route('suppliers.index') }}">
                  <span class="site-menu-title">Suplliers</span>
                </a>
              </li>
              <li class="site-menu-item {{ Request::is(['admin/expeditions', 'admin/expeditions/*']) ? 'active':''}}">
                <a href="{{ route('expeditions.index') }}">
                  <span class="site-menu-title">Expedition</span>
                </a>
              </li>
              <li class="site-menu-item {{ Request::is(['admin/shipping', 'admin/shipping/*']) ? 'active':''}}">
                <a href="{{ route('shipping.index') }}">
                  <span class="site-menu-title">Shipping</span>
                </a>
              </li>
              <li class="site-menu-item {{ Request::is(['admin/payments', 'admin/payments/*']) ? 'active':''}}">
                <a href="{{ route('payments.index') }}">
                  <span class="site-menu-title">Payments</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub {{ Request::is(['admin/product', 'admin/product/*']) ? 'active open':''}}">
            <a href="javascript:void(0)">
              <i class="site-menu-icon fa-dropbox" aria-hidden="true"></i>
              <span class="site-menu-title">Product</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item {{ Request::is(['admin/product', 'admin/product/*']) ? 'active':''}}">
                <a href="{{ route('product.index') }}">
                  <span class="site-menu-title">Pembuatan Product</span>
                </a>
              </li>

            </ul>
          </li>
          <li class="site-menu-item has-sub {{ Request::is(['admin/purchase', 'admin/purchase/*']) ? 'active open':''}}">
            <a href="javascript:void(0)">
              <i class="site-menu-icon fa-shopping-cart" aria-hidden="true"></i>
              <span class="site-menu-title">Purchase</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item {{ Request::is(['admin/purchase', 'admin/purchase/*']) ? 'active':''}}">
                <a href="{{ route('purchase.index') }}">
                  <span class="site-menu-title">Pembuatan Purchase</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub {{ Request::is([
            'admin/category-blogs', 'admin/category-blogs/*'
            , 'admin/blogs', 'admin/blogs/*'
            ]) ? 'active open':''}}">
            <a href="javascript:void(0)">
              <i class="site-menu-icon fa-newspaper-o" aria-hidden="true"></i>
              <span class="site-menu-title">Blogs</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item {{ Request::is(['admin/category-blogs', 'admin/category-blogs/*']) ? 'active':''}}">
                <a href="{{ route('category-blogs.index') }}">
                  <span class="site-menu-title">Category Blogs</span>
                </a>
              </li>
              <li class="site-menu-item {{ Request::is(['admin/blogs', 'admin/blogs/*']) ? 'active':''}}">
                <a href="{{ route('blogs.index') }}">
                  <span class="site-menu-title">Blogs</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="site-menu-item has-sub {{ Request::is([
            'admin/members', 'admin/members/*'
            , 'admin/orders', 'admin/orders/*'
            ]) ? 'active open':''}}">
            <a href="javascript:void(0)">
              <i class="site-menu-icon fa-users" aria-hidden="true"></i>
              <span class="site-menu-title">Member</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item {{ Request::is(['admin/members', 'admin/members/*']) ? 'active':''}}">
                <a href="{{ route('members.index') }}">
                  <span class="site-menu-title">Members Management</span>
                </a>
              </li>
              <li class="site-menu-item {{ Request::is(['admin/orders', 'admin/orders/*']) ? 'active':''}}">
                <a href="{{ route('orders.index') }}">
                  <span class="site-menu-title">Orders</span>
                </a>
              </li>
            </ul>
          </li>
          @can('user-list')
          <li class="site-menu-item {{ Request::is(['admin/users', 'admin/users/*']) ? 'active':''}}">
            <a href="{{ route('users.index') }}">
              <i class="site-menu-icon fa-user" aria-hidden="true"></i>
              <span class="site-menu-title">User Admin</span>
            </a>
          </li>
          @endcan
          @can('role-list')
          <li class="site-menu-item {{ Request::is(['admin/roles', 'admin/roles/*']) ? 'active':''}}">
            <a href="{{ route('roles.index')}}">
              <i class="site-menu-icon fa-cog" aria-hidden="true"></i>
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
