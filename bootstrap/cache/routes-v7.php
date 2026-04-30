<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/up' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RiXEMOyV6pNChGBL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::m5RW5zJyq8jiPWMc',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin-logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gYOeqm7lEM7AP2AV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oghbjC9rKlLD7sGv',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/verify-email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.notice',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/email/verification-notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.send',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/confirm-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wjV6vKDPVStb5MGY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/change-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'change-password.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'change-password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usermanage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usermanage.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'usermanage.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/usermanage/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usermanage.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/resign-employees' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resign-employees.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resign-employees.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/resign-employees/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resign-employees.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/resign-employee-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resign-employee-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/confirm/resign' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'confirm_resign',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/accounting/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accounting.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/accounting/bankmanage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accounting.bankmanage.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'accounting.bankmanage.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/accounting/bankmanage/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accounting.bankmanage.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientmanage/client' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.client.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.client.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientmanage/client/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.client.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientmanage/client-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.client-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientmanage/quototation-proposal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.quototation-proposal.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.quototation-proposal.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/clientmanage/quototation-proposal/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.quototation-proposal.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/warehouse' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'warehouse.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'warehouse.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/warehouse/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'warehouse.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/warehouse-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'warehouse-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/warehouse-stocks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'warehouse-stocks.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/warehouse-stock-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'warehouse-stock-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/stock-movements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stock-movements.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'stock-movements.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/stock-movements/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stock-movements.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/suppliermanage/supplier' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'suppliermanage.supplier.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'suppliermanage.supplier.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/suppliermanage/supplier/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'suppliermanage.supplier.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/suppliermanage/supplier-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'suppliermanage.supplier-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bq/bqcategory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqcategory.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqcategory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bq/bqcategory/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqcategory.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bq/bqworkscope' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqworkscope.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqworkscope.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bq/bqworkscope/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqworkscope.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/engineers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'engineers.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'engineers.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/engineers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'engineers.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/engineer-requests' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'engineer-requests.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'engineer-requests.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/engineer-requests/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'engineer-requests.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/engineer-requests/approval' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'engineer-requests.approval.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/engineer-requests/fixed-assset-request/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fixed-asset-request.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/engineer-requests/fixed-assset-request/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'fixed-asset-request.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/engineer-requests/variable-assset-request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'variable-asset-request.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/engineer-variable-asssets-request/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'engineer-variable-asset-request.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/qs-check-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'qs.check.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/detail-passed-qty' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'qs.passed.qty.detail',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logistics-check-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logistics.check.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/asset-requests/fixedAssets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'asset-requests.fixedAssets',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/assets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.assets.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'material.assets.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/assets/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.assets.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/assets-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.assets-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/get-assets-by-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.get-assets-by-type',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/get-categories-by-type' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.get-categories-by-type',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/get-asset-detail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.get-asset-detail',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/fixedassets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.fixedassets.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'material.fixedassets.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/fixedassets/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.fixedassets.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/fixedassets-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.fixedassets-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'material.category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/confirm/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.confirm_update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/category-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.category-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/variableassets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variableassets.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'material.variableassets.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/variableassets/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variableassets.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/variableassets-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variableassets-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/variable-category' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variable-category.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'material.variable-category.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/variable-category/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variable-category.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/material/variable-category-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variable-category-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/projects' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projects.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projects.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/projects/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projects.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.clients_get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/project' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projects_get',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/load/projects' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.load_projects',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/project-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.project-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/projectfiles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectfiles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectfiles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/project/files' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.get_project_files',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/project/files/view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.get_project_files_with_view',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/project/file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.project_file_delete',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/projectcategory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectcategory.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectcategory.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/projectcategory/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectcategory.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/projectcategory-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectcategory-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/workscope' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.workscope.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.workscope.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/workscope/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.workscope.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/projectmanage/workscope-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.workscope-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/configuration/role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.role.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.role.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/configuration/role/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.role.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/configuration/role-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.role-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/configuration/permission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.permission.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.permission.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/configuration/permission/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.permission.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/configuration/permission-datatable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.permission-datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/purchase' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/purchase/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/purchase/payment/due' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.payment.purchase_due',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/payment/purchase_payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.purchase_payment',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/res(?|et\\-password/([^/]++)(*:35)|ign\\-employees/([^/]++)(?|(*:68)|/edit(*:80)|(*:87)))|/verify\\-email/([^/]++)/([^/]++)(*:128)|/usermanage/(?|([^/]++)(?|/edit(*:167)|(*:175))|resign\\-submit(*:198)|block/([^/]++)(*:220)|unblock/([^/]++)(*:244)|toggle\\-block/([^/]++)(*:274))|/a(?|ccounting/bankmanage/([^/]++)(?|(*:320)|/edit(*:333)|(*:341))|ssign\\-(?|edit/([^/]++)(*:373)|update/([^/]++)(*:396)|destroy/([^/]++)(*:420)))|/c(?|lientmanage/(?|client/([^/]++)(?|(*:468)|/edit(*:481)|(*:489))|quot(?|otation\\-proposal/([^/]++)(?|(*:534)|/edit(*:547)|(*:555))|ation\\-proposal/([^/]++)(*:588))|d(?|e(?|tail/quotation\\-proposal/([^/]++)(*:638)|cline/quotation\\-proposal/([^/]++)(*:680))|raft/quotation\\-proposal/([^/]++)(*:722))|accept/quotation\\-proposal/([^/]++)(*:766))|onfiguration/(?|role/([^/]++)(?|(*:807)|/edit(*:820)|(*:828))|permission/([^/]++)(?|(*:859)|/edit(*:872)|(*:880))))|/warehouse/([^/]++)(?|(*:913)|/edit(*:926)|(*:934))|/s(?|to(?|ck\\-movements/([^/]++)(?|(*:978)|/edit(*:991)|(*:999))|rage/(.*)(*:1017))|uppliermanage/supplier/([^/]++)(?|(*:1061)|/edit(*:1075)|(*:1084)))|/bq/bq(?|category/([^/]++)(?|(*:1124)|/edit(*:1138)|(*:1147))|workscope/([^/]++)(?|(*:1178)|/edit(*:1192)|(*:1201)))|/engineer(?|s/(?|([^/]++)(?|(*:1240)|/edit(*:1254)|(*:1263))|assign(?|/([^/]++)(*:1291)|\\-project/([^/]++)(*:1318)))|\\-requests/pass_qty/([^/]++)(*:1357))|/qs\\-check\\-(?|create/([^/]++)(*:1397)|detail/([^/]++)(*:1421))|/logistics\\-check\\-create/([^/]++)(*:1465)|/material/(?|asset(?|s/([^/]++)(?|(*:1508)|/edit(*:1522)|(*:1531))|/damage/([^/]++)(*:1557))|detail/asset/([^/]++)(*:1588)|fixedassets/(?|([^/]++)(?|(*:1623)|/edit(*:1637)|(*:1646))|purchase(*:1664))|category/([^/]++)(?|(*:1694)|/edit(*:1708)|(*:1717))|variable(?|assets/([^/]++)(?|(*:1756)|/edit(*:1770)|(*:1779))|\\-category/([^/]++)(?|(*:1811)|/edit(*:1825)|(*:1834))))|/p(?|rojectmanage/(?|project(?|s/([^/]++)(?|(*:1890)|/edit(*:1904)|(*:1913))|files/([^/]++)(?|/edit(*:1945)|(*:1954))|category/([^/]++)(?|(*:1984)|/edit(*:1998)|(*:2007)))|workscope/([^/]++)(?|(*:2039)|/edit(*:2053)|(*:2062)))|urchase(?|/(?|([^/]++)(?|(*:2098)|/edit(*:2112)|(*:2121))|payment/([^/]++)/history(*:2155))|_order/purchase/([^/]++)(*:2189))|ayment/purchase_payment/([^/]++)(?|(*:2234)))|/invoice/p(?|urchase/([^/]++)(*:2274)|ayment/([^/]++)(*:2298))|/detail/purchase/([^/]++)(*:2333))/?$}sDu',
    ),
    3 => 
    array (
      35 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      68 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resign-employees.show',
          ),
          1 => 
          array (
            0 => 'resign_employee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      80 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resign-employees.edit',
          ),
          1 => 
          array (
            0 => 'resign_employee',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      87 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resign-employees.update',
          ),
          1 => 
          array (
            0 => 'resign_employee',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'resign-employees.destroy',
          ),
          1 => 
          array (
            0 => 'resign_employee',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      128 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.verify',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'hash',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      167 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usermanage.edit',
          ),
          1 => 
          array (
            0 => 'usermanage',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      175 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usermanage.update',
          ),
          1 => 
          array (
            0 => 'usermanage',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'usermanage.destroy',
          ),
          1 => 
          array (
            0 => 'usermanage',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      198 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usermanage.resign.submit',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usermanage.block',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usermanage.unblock',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      274 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usermanage.toggle-block',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      320 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accounting.bankmanage.show',
          ),
          1 => 
          array (
            0 => 'bankmanage',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      333 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accounting.bankmanage.edit',
          ),
          1 => 
          array (
            0 => 'bankmanage',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      341 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accounting.bankmanage.update',
          ),
          1 => 
          array (
            0 => 'bankmanage',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'accounting.bankmanage.destroy',
          ),
          1 => 
          array (
            0 => 'bankmanage',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      373 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assign-edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      396 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assign-update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      420 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assign-destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      468 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.client.show',
          ),
          1 => 
          array (
            0 => 'client',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      481 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.client.edit',
          ),
          1 => 
          array (
            0 => 'client',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      489 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.client.update',
          ),
          1 => 
          array (
            0 => 'client',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.client.destroy',
          ),
          1 => 
          array (
            0 => 'client',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      534 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.quototation-proposal.show',
          ),
          1 => 
          array (
            0 => 'quototation_proposal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      547 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.quototation-proposal.edit',
          ),
          1 => 
          array (
            0 => 'quototation_proposal',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      555 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.quototation-proposal.update',
          ),
          1 => 
          array (
            0 => 'quototation_proposal',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.quototation-proposal.destroy',
          ),
          1 => 
          array (
            0 => 'quototation_proposal',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      588 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.quototation-proposal.download',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      638 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.detail.quotation-proposal',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      680 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.decline.quotation-proposal',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      722 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.draft.quotation-proposal',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      766 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'clientmanage.accept.quotation-proposal',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      807 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.role.show',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.role.edit',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      828 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.role.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.role.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      859 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.permission.show',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      872 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.permission.edit',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      880 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.permission.update',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'configuration.permission.destroy',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      913 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'warehouse.show',
          ),
          1 => 
          array (
            0 => 'warehouse',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      926 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'warehouse.edit',
          ),
          1 => 
          array (
            0 => 'warehouse',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      934 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'warehouse.update',
          ),
          1 => 
          array (
            0 => 'warehouse',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'warehouse.destroy',
          ),
          1 => 
          array (
            0 => 'warehouse',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      978 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stock-movements.show',
          ),
          1 => 
          array (
            0 => 'stock_movement',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      991 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stock-movements.edit',
          ),
          1 => 
          array (
            0 => 'stock_movement',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      999 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'stock-movements.update',
          ),
          1 => 
          array (
            0 => 'stock_movement',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'stock-movements.destroy',
          ),
          1 => 
          array (
            0 => 'stock_movement',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1017 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'storage.local',
          ),
          1 => 
          array (
            0 => 'path',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1061 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'suppliermanage.supplier.show',
          ),
          1 => 
          array (
            0 => 'supplier',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1075 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'suppliermanage.supplier.edit',
          ),
          1 => 
          array (
            0 => 'supplier',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1084 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'suppliermanage.supplier.update',
          ),
          1 => 
          array (
            0 => 'supplier',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'suppliermanage.supplier.destroy',
          ),
          1 => 
          array (
            0 => 'supplier',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1124 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqcategory.show',
          ),
          1 => 
          array (
            0 => 'bqcategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1138 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqcategory.edit',
          ),
          1 => 
          array (
            0 => 'bqcategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1147 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqcategory.update',
          ),
          1 => 
          array (
            0 => 'bqcategory',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqcategory.destroy',
          ),
          1 => 
          array (
            0 => 'bqcategory',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1178 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqworkscope.show',
          ),
          1 => 
          array (
            0 => 'bqworkscope',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1192 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqworkscope.edit',
          ),
          1 => 
          array (
            0 => 'bqworkscope',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1201 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqworkscope.update',
          ),
          1 => 
          array (
            0 => 'bqworkscope',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'bq.bqworkscope.destroy',
          ),
          1 => 
          array (
            0 => 'bqworkscope',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1240 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'engineers.show',
          ),
          1 => 
          array (
            0 => 'engineer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1254 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'engineers.edit',
          ),
          1 => 
          array (
            0 => 'engineer',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1263 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'engineers.update',
          ),
          1 => 
          array (
            0 => 'engineer',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'engineers.destroy',
          ),
          1 => 
          array (
            0 => 'engineer',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1291 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'engineers.assign',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1318 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'assign-project',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1357 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pass_qty',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'qs.check.create',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1421 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'qs.check.detail',
          ),
          1 => 
          array (
            0 => 'asset_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1465 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logistics.check.create',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1508 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.assets.show',
          ),
          1 => 
          array (
            0 => 'asset',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1522 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.assets.edit',
          ),
          1 => 
          array (
            0 => 'asset',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1531 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.assets.update',
          ),
          1 => 
          array (
            0 => 'asset',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'material.assets.destroy',
          ),
          1 => 
          array (
            0 => 'asset',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1557 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.asset.damage',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1588 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.detail.asset',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1623 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.fixedassets.show',
          ),
          1 => 
          array (
            0 => 'fixedasset',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1637 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.fixedassets.edit',
          ),
          1 => 
          array (
            0 => 'fixedasset',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1646 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.fixedassets.update',
          ),
          1 => 
          array (
            0 => 'fixedasset',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'material.fixedassets.destroy',
          ),
          1 => 
          array (
            0 => 'fixedasset',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1664 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.fixedassets.purchase',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1694 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.category.show',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1708 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.category.edit',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1717 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.category.update',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'material.category.destroy',
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1756 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variableassets.show',
          ),
          1 => 
          array (
            0 => 'variableasset',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1770 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variableassets.edit',
          ),
          1 => 
          array (
            0 => 'variableasset',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1779 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variableassets.update',
          ),
          1 => 
          array (
            0 => 'variableasset',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'material.variableassets.destroy',
          ),
          1 => 
          array (
            0 => 'variableasset',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1811 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variable-category.show',
          ),
          1 => 
          array (
            0 => 'variable_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1825 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variable-category.edit',
          ),
          1 => 
          array (
            0 => 'variable_category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1834 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'material.variable-category.update',
          ),
          1 => 
          array (
            0 => 'variable_category',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'material.variable-category.destroy',
          ),
          1 => 
          array (
            0 => 'variable_category',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1890 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projects.show',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1904 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projects.edit',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1913 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projects.update',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projects.destroy',
          ),
          1 => 
          array (
            0 => 'project',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1945 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectfiles.edit',
          ),
          1 => 
          array (
            0 => 'projectfile',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1954 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectfiles.update',
          ),
          1 => 
          array (
            0 => 'projectfile',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1984 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectcategory.show',
          ),
          1 => 
          array (
            0 => 'projectcategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1998 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectcategory.edit',
          ),
          1 => 
          array (
            0 => 'projectcategory',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2007 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectcategory.update',
          ),
          1 => 
          array (
            0 => 'projectcategory',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.projectcategory.destroy',
          ),
          1 => 
          array (
            0 => 'projectcategory',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2039 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.workscope.show',
          ),
          1 => 
          array (
            0 => 'workscope',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2053 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.workscope.edit',
          ),
          1 => 
          array (
            0 => 'workscope',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2062 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.workscope.update',
          ),
          1 => 
          array (
            0 => 'workscope',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'projectmanage.workscope.destroy',
          ),
          1 => 
          array (
            0 => 'workscope',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2098 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.show',
          ),
          1 => 
          array (
            0 => 'purchase',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2112 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.edit',
          ),
          1 => 
          array (
            0 => 'purchase',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2121 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.update',
          ),
          1 => 
          array (
            0 => 'purchase',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'purchase.destroy',
          ),
          1 => 
          array (
            0 => 'purchase',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.pay.detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2189 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'order.purchase',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2234 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.pay',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'payment.pay.store',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2274 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'invoice.purchase',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2298 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payment.invoice.payment',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2333 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'detail.purchase',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::RiXEMOyV6pNChGBL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'up',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:828:"function () {
                    $exception = null;

                    try {
                        \\Illuminate\\Support\\Facades\\Event::dispatch(new \\Illuminate\\Foundation\\Events\\DiagnosingHealth);
                    } catch (\\Throwable $e) {
                        if (app()->hasDebugModeEnabled()) {
                            throw $e;
                        }

                        report($e);

                        $exception = $e->getMessage();
                    }

                    return response(\\Illuminate\\Support\\Facades\\View::file(\'/Users/may/Desktop/development/cms/vendor/laravel/framework/src/Illuminate/Foundation/Configuration\'.\'/../resources/health-up.blade.php\', [
                        \'exception\' => $exception,
                    ]), status: $exception ? 500 : 200);
                }";s:5:"scope";s:54:"Illuminate\\Foundation\\Configuration\\ApplicationBuilder";s:4:"this";N;s:4:"self";s:32:"000000000000059d0000000000000000";}}',
        'as' => 'generated::RiXEMOyV6pNChGBL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::m5RW5zJyq8jiPWMc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:47:"function () {
    return \\view(\'auth.login\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005a10000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::m5RW5zJyq8jiPWMc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'notBlocked',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:46:"function () {
    return \\view(\'dashboard\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005a30000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin-logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@adminLogout',
        'controller' => 'App\\Http\\Controllers\\AdminController@adminLogout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'admin-logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisteredUserController@create',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisteredUserController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::gYOeqm7lEM7AP2AV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisteredUserController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisteredUserController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::gYOeqm7lEM7AP2AV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@create',
        'controller' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::oghbjC9rKlLD7sGv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::oghbjC9rKlLD7sGv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController@create',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset-password/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\NewPasswordController@create',
        'controller' => 'App\\Http\\Controllers\\Auth\\NewPasswordController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\NewPasswordController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\NewPasswordController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.notice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'verify-email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\EmailVerificationPromptController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Auth\\EmailVerificationPromptController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verification.notice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'verify-email/{id}/{hash}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'signed',
          3 => 'throttle:6,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\VerifyEmailController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerifyEmailController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verification.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.send' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'email/verification-notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'throttle:6,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\EmailVerificationNotificationController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\EmailVerificationNotificationController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verification.send',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'confirm-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController@show',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::wjV6vKDPVStb5MGY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'confirm-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::wjV6vKDPVStb5MGY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordController@update',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@destroy',
        'controller' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileController@edit',
        'controller' => 'App\\Http\\Controllers\\ProfileController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profile.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'change-password.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordController@edit',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'change-password.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'change-password.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordController@update',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'change-password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usermanage.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usermanage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'usermanage.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usermanage.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usermanage/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'usermanage.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usermanage.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usermanage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'usermanage.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usermanage.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'usermanage/{usermanage}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'usermanage.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usermanage.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'usermanage/{usermanage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'usermanage.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usermanage.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'usermanage/{usermanage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'usermanage.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@userDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@userDataTable',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'user-datatable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usermanage.resign.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usermanage/resign-submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@resignSubmit',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@resignSubmit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'usermanage.resign.submit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usermanage.block' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usermanage/block/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@blockUser',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@blockUser',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'usermanage.block',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usermanage.unblock' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usermanage/unblock/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@unblockUser',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@unblockUser',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'usermanage.unblock',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usermanage.toggle-block' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'usermanage/toggle-block/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@toggleBlock',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\UserController@toggleBlock',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'usermanage.toggle-block',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resign-employees.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'resign-employees',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'resign-employees.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resign-employees.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'resign-employees/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'resign-employees.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resign-employees.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'resign-employees',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'resign-employees.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resign-employees.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'resign-employees/{resign_employee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'resign-employees.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resign-employees.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'resign-employees/{resign_employee}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'resign-employees.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resign-employees.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'resign-employees/{resign_employee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'resign-employees.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resign-employees.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'resign-employees/{resign_employee}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'resign-employees.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resign-employee-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'resign-employee-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@resignEmployeeDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@resignEmployeeDataTable',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'resign-employee-datatable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'confirm_resign' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'confirm/resign',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@confirm_resign',
        'controller' => 'App\\Http\\Controllers\\Backend\\UserManagement\\ResignController@confirm_resign',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'confirm_resign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accounting.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accounting/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Accounting\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Accounting\\DashboardController@index',
        'as' => 'accounting.dashboard',
        'namespace' => NULL,
        'prefix' => '/accounting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accounting.bankmanage.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accounting/bankmanage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'accounting.bankmanage.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@index',
        'namespace' => NULL,
        'prefix' => '/accounting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accounting.bankmanage.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accounting/bankmanage/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'accounting.bankmanage.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@create',
        'namespace' => NULL,
        'prefix' => '/accounting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accounting.bankmanage.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'accounting/bankmanage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'accounting.bankmanage.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@store',
        'namespace' => NULL,
        'prefix' => '/accounting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accounting.bankmanage.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accounting/bankmanage/{bankmanage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'accounting.bankmanage.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@show',
        'namespace' => NULL,
        'prefix' => '/accounting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accounting.bankmanage.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'accounting/bankmanage/{bankmanage}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'accounting.bankmanage.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@edit',
        'namespace' => NULL,
        'prefix' => '/accounting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accounting.bankmanage.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'accounting/bankmanage/{bankmanage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'accounting.bankmanage.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@update',
        'namespace' => NULL,
        'prefix' => '/accounting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accounting.bankmanage.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'accounting/bankmanage/{bankmanage}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'accounting.bankmanage.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\BankManagement\\BankController@destroy',
        'namespace' => NULL,
        'prefix' => '/accounting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.client.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/client',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.client.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@index',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.client.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/client/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.client.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@create',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.client.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'clientmanage/client',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.client.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@store',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.client.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/client/{client}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.client.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@show',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.client.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/client/{client}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.client.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@edit',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.client.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'clientmanage/client/{client}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.client.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@update',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.client.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'clientmanage/client/{client}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.client.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@destroy',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.client-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/client-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@clientDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\ClientController@clientDataTable',
        'as' => 'clientmanage.client-datatable',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.quototation-proposal.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/quototation-proposal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.quototation-proposal.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@index',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.quototation-proposal.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/quototation-proposal/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.quototation-proposal.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@create',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.quototation-proposal.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'clientmanage/quototation-proposal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.quototation-proposal.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@store',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.quototation-proposal.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/quototation-proposal/{quototation_proposal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.quototation-proposal.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@show',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.quototation-proposal.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/quototation-proposal/{quototation_proposal}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.quototation-proposal.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@edit',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.quototation-proposal.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'clientmanage/quototation-proposal/{quototation_proposal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.quototation-proposal.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@update',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.quototation-proposal.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'clientmanage/quototation-proposal/{quototation_proposal}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'clientmanage.quototation-proposal.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@destroy',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.detail.quotation-proposal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/detail/quotation-proposal/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@detailQuotation',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@detailQuotation',
        'as' => 'clientmanage.detail.quotation-proposal',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.accept.quotation-proposal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/accept/quotation-proposal/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@acceptanceQuotation',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@acceptanceQuotation',
        'as' => 'clientmanage.accept.quotation-proposal',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.draft.quotation-proposal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/draft/quotation-proposal/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@draftQuotation',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@draftQuotation',
        'as' => 'clientmanage.draft.quotation-proposal',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.decline.quotation-proposal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/decline/quotation-proposal/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@declineQuotation',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@declineQuotation',
        'as' => 'clientmanage.decline.quotation-proposal',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'clientmanage.quototation-proposal.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'clientmanage/quotation-proposal/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@quotationProposal',
        'controller' => 'App\\Http\\Controllers\\Backend\\ClientManagement\\QuotationProposalController@quotationProposal',
        'as' => 'clientmanage.quototation-proposal.download',
        'namespace' => NULL,
        'prefix' => '/clientmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'warehouse.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'warehouse',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'warehouse.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'warehouse.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'warehouse/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'warehouse.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'warehouse.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'warehouse',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'warehouse.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'warehouse.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'warehouse/{warehouse}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'warehouse.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'warehouse.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'warehouse/{warehouse}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'warehouse.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'warehouse.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'warehouse/{warehouse}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'warehouse.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'warehouse.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'warehouse/{warehouse}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'warehouse.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'warehouse-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'warehouse-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@warehouseDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseController@warehouseDataTable',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'warehouse-datatable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'warehouse-stocks.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'warehouse-stocks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'warehouse-stocks.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseStockController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseStockController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'warehouse-stock-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'warehouse-stock-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseStockController@warehouseStockDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\WarehouseStockController@warehouseStockDataTable',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'warehouse-stock-datatable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stock-movements.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'stock-movements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'stock-movements.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stock-movements.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'stock-movements/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'stock-movements.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stock-movements.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'stock-movements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'stock-movements.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stock-movements.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'stock-movements/{stock_movement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'stock-movements.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stock-movements.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'stock-movements/{stock_movement}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'stock-movements.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stock-movements.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'stock-movements/{stock_movement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'stock-movements.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'stock-movements.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'stock-movements/{stock_movement}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'stock-movements.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\StockManagement\\StockMovementController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'suppliermanage.supplier.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'suppliermanage/supplier',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'suppliermanage.supplier.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@index',
        'namespace' => NULL,
        'prefix' => '/suppliermanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'suppliermanage.supplier.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'suppliermanage/supplier/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'suppliermanage.supplier.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@create',
        'namespace' => NULL,
        'prefix' => '/suppliermanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'suppliermanage.supplier.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'suppliermanage/supplier',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'suppliermanage.supplier.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@store',
        'namespace' => NULL,
        'prefix' => '/suppliermanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'suppliermanage.supplier.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'suppliermanage/supplier/{supplier}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'suppliermanage.supplier.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@show',
        'namespace' => NULL,
        'prefix' => '/suppliermanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'suppliermanage.supplier.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'suppliermanage/supplier/{supplier}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'suppliermanage.supplier.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@edit',
        'namespace' => NULL,
        'prefix' => '/suppliermanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'suppliermanage.supplier.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'suppliermanage/supplier/{supplier}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'suppliermanage.supplier.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@update',
        'namespace' => NULL,
        'prefix' => '/suppliermanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'suppliermanage.supplier.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'suppliermanage/supplier/{supplier}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'suppliermanage.supplier.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@destroy',
        'namespace' => NULL,
        'prefix' => '/suppliermanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'suppliermanage.supplier-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'suppliermanage/supplier-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@supplierDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\SupplierManagement\\SupplierController@supplierDataTable',
        'as' => 'suppliermanage.supplier-datatable',
        'namespace' => NULL,
        'prefix' => '/suppliermanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqcategory.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bq/bqcategory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqcategory.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@index',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqcategory.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bq/bqcategory/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqcategory.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@create',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqcategory.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'bq/bqcategory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqcategory.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@store',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqcategory.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bq/bqcategory/{bqcategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqcategory.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@show',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqcategory.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bq/bqcategory/{bqcategory}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqcategory.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@edit',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqcategory.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'bq/bqcategory/{bqcategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqcategory.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@update',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqcategory.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'bq/bqcategory/{bqcategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqcategory.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\BQ\\BoqCategoriesController@destroy',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqworkscope.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bq/bqworkscope',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqworkscope.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@index',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqworkscope.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bq/bqworkscope/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqworkscope.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@create',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqworkscope.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'bq/bqworkscope',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqworkscope.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@store',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqworkscope.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bq/bqworkscope/{bqworkscope}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqworkscope.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@show',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqworkscope.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bq/bqworkscope/{bqworkscope}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqworkscope.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@edit',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqworkscope.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'bq/bqworkscope/{bqworkscope}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqworkscope.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@update',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'bq.bqworkscope.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'bq/bqworkscope/{bqworkscope}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'bq.bqworkscope.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@destroy',
        'namespace' => NULL,
        'prefix' => '/bq',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'engineers.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineers/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'engineers.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineers.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'engineers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'engineers.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineers.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineers/{engineer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'engineers.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineers/{engineer}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'engineers.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineers.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'engineers/{engineer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'engineers.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineers.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'engineers/{engineer}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'engineers.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineers.assign' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineers/assign/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@assignForm',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerManage\\EngineersController@assignForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'engineers.assign',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'assign-project' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineers/assign-project/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerAssign\\EnigneerAssignController@assignProject',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerAssign\\EnigneerAssignController@assignProject',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'assign-project',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'assign-edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'assign-edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerAssign\\EnigneerAssignController@assignProjectEdit',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerAssign\\EnigneerAssignController@assignProjectEdit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'assign-edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'assign-update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'assign-update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerAssign\\EnigneerAssignController@assignProjectUpdate',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerAssign\\EnigneerAssignController@assignProjectUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'assign-update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'assign-destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'assign-destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerAssign\\EnigneerAssignController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerAssign\\EnigneerAssignController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'assign-destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineer-requests.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineer-requests',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'engineer-requests.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineer-requests.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineer-requests/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'engineer-requests.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineer-requests.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'engineer-requests',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'engineer-requests.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineer-requests.approval.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'engineer-requests/approval',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AssetRequestApproval\\AssetRequestApprovalController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\AssetRequestApproval\\AssetRequestApprovalController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'engineer-requests.approval.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pass_qty' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineer-requests/pass_qty/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@passQty',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@passQty',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'pass_qty',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fixed-asset-request.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineer-requests/fixed-assset-request/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@fixedAssestsRequestIndex',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@fixedAssestsRequestIndex',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'fixed-asset-request.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'fixed-asset-request.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineer-requests/fixed-assset-request/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@fixedAssestsRequestCreate',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@fixedAssestsRequestCreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'fixed-asset-request.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'variable-asset-request.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineer-requests/variable-assset-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@variableAssestsRequestIndex',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@variableAssestsRequestIndex',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'variable-asset-request.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'engineer-variable-asset-request.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'engineer-variable-asssets-request/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@variableAssestsRequestCreate',
        'controller' => 'App\\Http\\Controllers\\Backend\\EngineerRequest\\EngineerRequestController@variableAssestsRequestCreate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'engineer-variable-asset-request.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'qs.check.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'qs-check-create/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\QSTeamCheck\\QSTeamCheckController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\QSTeamCheck\\QSTeamCheckController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'qs.check.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'qs.check.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'qs-check-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\QSTeamCheck\\QSTeamCheckController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\QSTeamCheck\\QSTeamCheckController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'qs.check.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'qs.check.detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'qs-check-detail/{asset_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\QSTeamCheck\\QSTeamCheckController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\QSTeamCheck\\QSTeamCheckController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'qs.check.detail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'qs.passed.qty.detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'detail-passed-qty',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\QSTeamCheck\\QSTeamCheckController@detailPassedQty',
        'controller' => 'App\\Http\\Controllers\\Backend\\QSTeamCheck\\QSTeamCheckController@detailPassedQty',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'qs.passed.qty.detail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logistics.check.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logistics-check-create/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\LogisticsTeamCheck\\LogisticsTeamCheckController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\LogisticsTeamCheck\\LogisticsTeamCheckController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logistics.check.create',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logistics.check.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logistics-check-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\LogisticsTeamCheck\\LogisticsTeamCheckController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\LogisticsTeamCheck\\LogisticsTeamCheckController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logistics.check.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'asset-requests.fixedAssets' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'asset-requests/fixedAssets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\AssetRequestController@fixedAssets',
        'controller' => 'App\\Http\\Controllers\\Backend\\AssetRequestController@fixedAssets',
        'as' => 'asset-requests.fixedAssets',
        'namespace' => NULL,
        'prefix' => '/asset-requests',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.assets.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/assets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.assets.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@index',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.assets.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/assets/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.assets.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@create',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.assets.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'material/assets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.assets.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@store',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.assets.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/assets/{asset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.assets.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@show',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.assets.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/assets/{asset}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.assets.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@edit',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.assets.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'material/assets/{asset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.assets.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@update',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.assets.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'material/assets/{asset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.assets.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@destroy',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.assets-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/assets-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@assetsDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@assetsDataTable',
        'as' => 'material.assets-datatable',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.get-assets-by-type' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/get-assets-by-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@getAssetsByType',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@getAssetsByType',
        'as' => 'material.get-assets-by-type',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.get-categories-by-type' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/get-categories-by-type',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@getCategoriesByType',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@getCategoriesByType',
        'as' => 'material.get-categories-by-type',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.get-asset-detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/get-asset-detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@getAssetDetail',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@getAssetDetail',
        'as' => 'material.get-asset-detail',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.detail.asset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/detail/asset/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@detailAsset',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@detailAsset',
        'as' => 'material.detail.asset',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.asset.damage' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/asset/damage/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@damageAsset',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\AssetController@damageAsset',
        'as' => 'material.asset.damage',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.fixedassets.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/fixedassets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.fixedassets.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@index',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.fixedassets.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/fixedassets/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.fixedassets.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@create',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.fixedassets.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'material/fixedassets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.fixedassets.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@store',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.fixedassets.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/fixedassets/{fixedasset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.fixedassets.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@show',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.fixedassets.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/fixedassets/{fixedasset}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.fixedassets.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@edit',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.fixedassets.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'material/fixedassets/{fixedasset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.fixedassets.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@update',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.fixedassets.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'material/fixedassets/{fixedasset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.fixedassets.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@destroy',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.fixedassets-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/fixedassets-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@fixedassetsDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController@fixedassetsDataTable',
        'as' => 'material.fixedassets-datatable',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.fixedassets.purchase' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'material/fixedassets/purchase',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        0 => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\FixedAssetsController',
        'uses' => NULL,
        'as' => 'material.fixedassets.purchase',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.category.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.category.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@index',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.category.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/category/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.category.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@create',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'material/category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.category.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@store',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.category.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.category.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@show',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/category/{category}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.category.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@edit',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'material/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.category.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@update',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.category.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'material/category/{category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.category.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@destroy',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.confirm_update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'material/confirm/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@confirm_update',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@confirm_update',
        'as' => 'material.confirm_update',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.category-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/category-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@categoryDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\FixedAssets\\CategoryController@categoryDataTable',
        'as' => 'material.category-datatable',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variableassets.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/variableassets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variableassets.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@index',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variableassets.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/variableassets/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variableassets.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@create',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variableassets.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'material/variableassets',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variableassets.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@store',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variableassets.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/variableassets/{variableasset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variableassets.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@show',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variableassets.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/variableassets/{variableasset}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variableassets.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@edit',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variableassets.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'material/variableassets/{variableasset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variableassets.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@update',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variableassets.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'material/variableassets/{variableasset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variableassets.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@destroy',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variableassets-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/variableassets-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@variableassetsDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableAssetsController@variableassetsDataTable',
        'as' => 'material.variableassets-datatable',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variable-category.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/variable-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variable-category.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@index',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variable-category.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/variable-category/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variable-category.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@create',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variable-category.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'material/variable-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variable-category.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@store',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variable-category.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/variable-category/{variable_category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variable-category.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@show',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variable-category.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/variable-category/{variable_category}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variable-category.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@edit',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variable-category.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'material/variable-category/{variable_category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variable-category.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@update',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variable-category.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'material/variable-category/{variable_category}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'material.variable-category.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@destroy',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'material.variable-category-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'material/variable-category-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@variablecategoryDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\MaterialManagement\\VariableAssets\\VariableCategoryController@variablecategoryDataTable',
        'as' => 'material.variable-category-datatable',
        'namespace' => NULL,
        'prefix' => '/material',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projects.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projects',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projects.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@index',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projects.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projects/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projects.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@create',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projects.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'projectmanage/projects',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projects.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@store',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projects.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projects/{project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projects.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@show',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projects.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projects/{project}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projects.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@edit',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projects.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'projectmanage/projects/{project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projects.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@update',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projects.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'projectmanage/projects/{project}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projects.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@destroy',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.clients_get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@getClient',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@getClient',
        'as' => 'projectmanage.clients_get',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projects_get' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/project',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@getProject',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@getProject',
        'as' => 'projectmanage.projects_get',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.load_projects' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/load/projects',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@load_projects',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@load_projects',
        'as' => 'projectmanage.load_projects',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.project-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/project-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@projectDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectController@projectDataTable',
        'as' => 'projectmanage.project-datatable',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectfiles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projectfiles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectfiles.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@index',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectfiles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'projectmanage/projectfiles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectfiles.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@store',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectfiles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projectfiles/{projectfile}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectfiles.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@edit',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectfiles.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'projectmanage/projectfiles/{projectfile}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectfiles.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@update',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.get_project_files' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/project/files',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@get_project_files',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@get_project_files',
        'as' => 'projectmanage.get_project_files',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.get_project_files_with_view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/project/files/view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@get_project_files_with_view',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@get_project_files_with_view',
        'as' => 'projectmanage.get_project_files_with_view',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.project_file_delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/project/file',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectFilesController@destroy',
        'as' => 'projectmanage.project_file_delete',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectcategory.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projectcategory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectcategory.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@index',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectcategory.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projectcategory/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectcategory.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@create',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectcategory.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'projectmanage/projectcategory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectcategory.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@store',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectcategory.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projectcategory/{projectcategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectcategory.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@show',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectcategory.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projectcategory/{projectcategory}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectcategory.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@edit',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectcategory.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'projectmanage/projectcategory/{projectcategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectcategory.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@update',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectcategory.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'projectmanage/projectcategory/{projectcategory}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.projectcategory.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@destroy',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.projectcategory-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/projectcategory-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@projectCategoryDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\ProjectCategoryController@projectCategoryDataTable',
        'as' => 'projectmanage.projectcategory-datatable',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.workscope.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/workscope',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.workscope.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@index',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.workscope.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/workscope/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.workscope.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@create',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.workscope.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'projectmanage/workscope',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.workscope.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@store',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.workscope.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/workscope/{workscope}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.workscope.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@show',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.workscope.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/workscope/{workscope}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.workscope.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@edit',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.workscope.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'projectmanage/workscope/{workscope}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.workscope.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@update',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.workscope.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'projectmanage/workscope/{workscope}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'projectmanage.workscope.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@destroy',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'projectmanage.workscope-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'projectmanage/workscope-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@workscopeDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\ProjectManagement\\WorkscopeController@workscopeDataTable',
        'as' => 'projectmanage.workscope-datatable',
        'namespace' => NULL,
        'prefix' => '/projectmanage',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.role.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configuration/role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.role.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@index',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.role.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configuration/role/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.role.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@create',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.role.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'configuration/role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.role.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@store',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.role.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configuration/role/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.role.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@show',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.role.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configuration/role/{role}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.role.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@edit',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.role.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'configuration/role/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.role.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@update',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.role.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'configuration/role/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.role.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@destroy',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.role-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configuration/role-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@roleDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\RoleController@roleDataTable',
        'as' => 'configuration.role-datatable',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.permission.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configuration/permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.permission.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@index',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.permission.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configuration/permission/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.permission.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@create',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.permission.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'configuration/permission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.permission.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@store',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.permission.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configuration/permission/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.permission.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@show',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.permission.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configuration/permission/{permission}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.permission.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@edit',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.permission.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'configuration/permission/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.permission.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@update',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.permission.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'configuration/permission/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'configuration.permission.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@destroy',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'configuration.permission-datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'configuration/permission-datatable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@permissionDataTable',
        'controller' => 'App\\Http\\Controllers\\Backend\\Configuration\\PermissionController@permissionDataTable',
        'as' => 'configuration.permission-datatable',
        'namespace' => NULL,
        'prefix' => '/configuration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'purchase',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'purchase.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'purchase/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'purchase.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'purchase',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'purchase.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'purchase/{purchase}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'purchase.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'purchase/{purchase}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'purchase.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'purchase/{purchase}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'purchase.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'purchase/{purchase}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'as' => 'purchase.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'purchase.payment.purchase_due' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'purchase/payment/due',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@purchaseDue',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@purchaseDue',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'purchase.payment.purchase_due',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'invoice.purchase' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'invoice/purchase/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@invoicePurchase',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@invoicePurchase',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'invoice.purchase',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'detail.purchase' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'detail/purchase/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@detailPurchase',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@detailPurchase',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'detail.purchase',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'order.purchase' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'purchase_order/purchase/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\PurchaseController@purchaseOrder',
        'controller' => 'App\\Http\\Controllers\\Backend\\PurchaseController@purchaseOrder',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'order.purchase',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.purchase_payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payment/purchase_payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Payment\\PaymentController@payPurchase',
        'controller' => 'App\\Http\\Controllers\\Backend\\Payment\\PaymentController@payPurchase',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.purchase_payment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.pay' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payment/purchase_payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Payment\\PaymentController@pay',
        'controller' => 'App\\Http\\Controllers\\Backend\\Payment\\PaymentController@pay',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.pay',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.pay.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payment/purchase_payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Payment\\PaymentController@payStore',
        'controller' => 'App\\Http\\Controllers\\Backend\\Payment\\PaymentController@payStore',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.pay.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.pay.detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'purchase/payment/{id}/history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Payment\\PaymentController@payDetail',
        'controller' => 'App\\Http\\Controllers\\Backend\\Payment\\PaymentController@payDetail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.pay.detail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payment.invoice.payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'invoice/payment/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'notBlocked',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Payment\\PaymentController@invoicePayment',
        'controller' => 'App\\Http\\Controllers\\Backend\\Payment\\PaymentController@invoicePayment',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payment.invoice.payment',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'storage.local' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'storage/{path}',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:3:{s:4:"disk";s:5:"local";s:6:"config";a:5:{s:6:"driver";s:5:"local";s:4:"root";s:54:"/Users/may/Desktop/development/cms/storage/app/private";s:5:"serve";b:1;s:5:"throw";b:0;s:6:"report";b:0;}s:12:"isProduction";b:0;}s:8:"function";s:323:"function (\\Illuminate\\Http\\Request $request, string $path) use ($disk, $config, $isProduction) {
                    return (new \\Illuminate\\Filesystem\\ServeFile(
                        $disk,
                        $config,
                        $isProduction
                    ))($request, $path);
                }";s:5:"scope";s:47:"Illuminate\\Filesystem\\FilesystemServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000005a60000000000000000";}}',
        'as' => 'storage.local',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'path' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
