<?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  include_once $path . '/wp-config.php';
  
  global $wpdb;
  global $current_user;
  
  $role = get_current_user_role();
  if (!((is_user_logged_in() && $role=="Administrador") || (is_user_logged_in() && $role=="Editor"))) {
    header('Location: /');
  }
  
  $result = $wpdb->get_results("SELECT * FROM $wpdb->partners");
?>

  <?php get_header(); ?>
    
    <div class="partners_list">
      <div class="top">
        <h1>Listado socios</h1>
      </div>
      <div class="middle">
        <table>
          <thead>
            <tr>
              <th> - </th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Dirección</th>
              <th>Cod. Postal</th>
              <th>Ciudad</th>
              <th>Provincia</th>
              <th>Teléfono</th>
              <th>Email</th>
              <th>Nº Socio</th>
            </tr>
          </thead>
          <tbody>
            <?php

              foreach ($result as $row) {
                  echo '<tr>';
                    echo '<td>'.$row->user_id.'</td>';
                    echo '<td>'.$row->name.'</td>';
                    echo '<td>'.$row->surname.'</td>';
                    echo '<td>'.$row->address.'</td>';
                    echo '<td>'.$row->postal_code.'</td>';
                    echo '<td>'.$row->city.'</td>';
                    echo '<td>'.$row->province.'</td>';
                    echo '<td>'.$row->phone.'</td>';
                    echo '<td>'.$row->email.'</td>';
                    echo '<td>'.$row->partner_number.'</td>';
                  echo '</tr>';
              }

            ?>


          </tbody>
        </table>
      </div>
      <div class="bottom"></div>
    </div>
    

  <?php get_footer(); ?>