<?php
session_start();
if ( isset( $_SESSION[ 'D_userid' ] ) ) {
  include_once "../../../connect.php";
  $utgoing_chat_id = $_SESSION[ 'D_userid' ];
  $incoming_id = mysqli_real_escape_string( $connect, $_POST[ 'incoming_id' ] );
  $output = "";
 
  $sql = "SELECT * FROM messages LEFT JOIN doctor ON doctor.Resgistration_Number = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$utgoing_chat_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$utgoing_chat_id}) ORDER BY msg_id";
  $query = mysqli_query( $connect, $sql );
  if ( mysqli_num_rows( $query ) > 0 ) {
    while ( $row = mysqli_fetch_assoc( $query ) ) {
      if ( $row[ 'outgoing_msg_id' ] === $utgoing_chat_id ) {
        if ( empty($row['img']) ) {
         
          $output .= '<div class="order-chat-list-sec right-chat">
										          <div class="order-chat-area">
											         ' . $row[ 'msg' ] . '
                    <div class="msg-time"></div>
										          </div>
									           </div>';
         
        } else {
         
           $output .= '<div class="img-right">
                    <img src="../../img/uploads/' . $row['img'] . '" onclick="openPopup(this)" ondblclick="downloadImage(this)">
                </div>';
          
        }
      } else {
        if ( empty($row['img']) ) {
         
          $output .= '<div class="order-chat-list-sec left-chat">
										<div class="order-chat-area">' . $row[ 'msg' ] . '
          <div class="msg-time"></div>
										</div>
									</div>';
         
        } else {
         
           $output .= '<div class="img-left">
                    <img src="../../img/uploads/' . $row['img'] . '" onclick="openPopup(this)" ondblclick="downloadImage(this)">
                </div>';
          
        }
      }
    }
   
   
  } else {
    $output .= '<div class="no_msg">No messages are available. Once you send message they will appear here.</div>';
  }
  echo $output;
} else {
  header( "location: ../login.php" );
}

?>