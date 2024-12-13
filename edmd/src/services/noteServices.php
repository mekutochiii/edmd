<?php
// switch ($_POST['type']) {
//     case 'create_note':
//         $ctr = new noteController();
//         echo json_encode($ctr->create($_POST));
//         break;

//     case 'read_notes':
//         $ctr = new noteController();
//         echo json_encode($ctr->read());
//         break;

//     case 'update_note':
//         $ctr = new noteController();
//         echo json_encode($ctr->update($_POST));
//         break;

//     case 'delete_note':
//         $ctr = new noteController();
//         echo json_encode($ctr->delete($_POST['id']));
//         break;

//     default:
//         echo json_encode(['error' => 'Invalid request type']);
//         break;
// }