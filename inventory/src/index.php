<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  <title>TKUISA's Inventory</title>
  <link href="style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap"/>
</head>
<body>
  <div class="container">
    <div class="side_bar">
      <div class="side_top">
        <img src="image/main_logo.png" alt="TKUISA LOGO" />
        <p>Inventory</p>
        <button class="med_button" id="addBtn">Add Item</button>
      </div>

      <div class="side_bottom">
        <button class="med_button" onclick="about()">About</button>
        <script>
          function about() {
            window.location.href = 'about.php'
          }
        </script>
        <p>coded and designed by</p>
        <p id="Bold">ASEP STROBERI</p>
      </div>
    </div>

    <div class="main">
      <div class="top_segment">
        <div class="search_bar">
          <span class="material-symbols-outlined">search</span>
          <input class="search_input" type="search" placeholder="Search for an item" />
        </div>
        <button class="log_out" onclick="logout()">Log Out</button>
        <script>
          function logout() {
            window.location.href = '../login.php';
          }
        </script>
      </div>

      <div class="bottom_segment">
        <div class="table">
          <div class="thead">
            <div class="tr_title">
              <p>No.</p>
              <p>Image</p>
              <p>Remarks</p>
              <p>Code</p>
              <p>Quantity</p>
              <p>Modify</p>
            </div>
          </div>
          <div class="tcontent">
            <?php
              include('connect.php');
              $sql = "SELECT * FROM items";
              $result = $conn->query($sql);
              $count = 1;
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  if ($count % 2) {
  echo "            <div class='card' id='card_odd'>";
  echo "              <p class='card_text'>" . $count++ . "</p>";
  echo "              <p class='card_image'><img src='image/" . $row["product_image"] . "' alt='Image'></p>";
  echo "              <p class='card_text'>" . $row["product_remarks"] . "</p>";
  echo "              <p class='card_text'>" . $row["product_code"] . "</p>";
  echo "              <p class='card_text'>" . $row["product_quantity"] . "</p>";
  echo "              <p class='card_button'>
                        <button id='cardButton' onclick=\"if(confirm('Delete this item?')) window.location.href='delete.php?id=" . $row["id"] . "';\">Delete</button>
                        <button id='cardButton' class='editBtn' data-id='" . $row["id"] . "'data-remarks='" . htmlspecialchars($row["product_remarks"], ENT_QUOTES) . "'data-code='" . $row["product_code"] . "'data-quantity='" . $row["product_quantity"] . "'>
                          Edit
                        </button>
                      </p>";
  echo "            </div>";
                  } else {
  echo "            <div class='card' id='card_even'>";
  echo "              <p class='card_text'>" . $count++ . "</p>";
  echo "              <p class='card_image' ><img src='image/" . $row["product_image"] . "'alt='Image'></p>";
  echo "              <p class='card_text'>" . $row["product_remarks"] . "</p>";
  echo "              <p class='card_text'>" . $row["product_code"] . "</p>";
  echo "              <p class='card_text'>" . $row["product_quantity"] . "</p>";
  echo "              <p class='card_button'>
                        <button id='cardButton' onclick=\"if(confirm('Delete this item?')) window.location.href='delete.php?id=" . $row["id"] . "';\">Delete</button>
                        <button id='cardButton' class='editBtn' data-id='" . $row["id"] . "'data-remarks='" . htmlspecialchars($row["product_remarks"], ENT_QUOTES) . "'data-code='" . $row["product_code"] . "'data-quantity='" . $row["product_quantity"] . "'>
                          Edit
                        </button>
                      </p>";
  echo "            </div>";
                  }
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="popup" id="addPopup">
    <div class="popup_content">
      <div class="popup_header">
        <h2>Add New Items</h2>
        <span class="popup_close" id="closePopupBtn">&times;</span>
      </div>

      <form method="POST" enctype="multipart/form-data" action="add.php">
        <div class="form_group">
          <label for="productName">Item Name *</label>
          <input type="text" id="productName" name="product_remarks" required />
        </div>

        <div class="form_group">
          <label for="productCode">Item Code *</label>
          <input type="text" id="productCode" name="product_code" required />
        </div>

        <div class="form_group">
          <label for="productQuantity">Quantity *</label>
          <input type="number" id="productQuantity" name="product_quantity" min="1" required />
        </div>

        <div class="form_group">
          <label for="productImage">Image *</label>
          <input type="file" id="productImage" name="product_image" required />
        </div>

        <div class="add_popup_actions">
          <button type="button" class="btn cancel_btn" id="cancelBtn" name="cancel">Cancel</button>
          <button type="submit" class="btn add_btn" name="add">Add</button>
        </div>
      </form>
    </div>
  </div>

  <div class="popup" id="editPopup">
    <div class="popup_content">
      <div class="popup_header">
        <h2>Edit Item</h2>
        <span class="popup_close" id="closeEditPopupBtn">&times;</span>
      </div>

      <form method="POST" enctype="multipart/form-data" action="update.php">
        <input type="hidden" id="editId" name="id" />
        <div class="form_group">
          <label for="editRemarks">Item Name *</label>
          <input type="text" id="editRemarks" name="product_remarks" required />
        </div>

        <div class="form_group">
          <label for="editCode">Item Code *</label>
          <input type="text" id="editCode" name="product_code" required />
        </div>

        <div class="form_group">
          <label for="editQuantity">Quantity *</label>
          <input type="number" id="editQuantity" name="product_quantity" min="1" required />
        </div>

        <div class="form_group">
          <label for="editImage">Change Image (optional)</label>
          <input type="file" id="editImage" name="product_image" />
        </div>
        
        <div class="add_popup_actions">
          <button type="button" class="btn cancel_btn" id="cancelEditBtn">Cancel</button>
          <button type="submit" class="btn add_btn" name="update">Update</button>
        </div>
      </form>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
