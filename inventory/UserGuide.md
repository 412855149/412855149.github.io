# User Guide

Welcome to the **Tkuisa Inventory Management System User Guide**. This guide will help end-users understand how to interact with the system to manage inventory records efficiently.

---

## System Overview

This web-based inventory system helps you manage item entries (add, edit, and delete). It's built using PHP, CSS, JavaScript, and a MariaDB database.

---

## Table of Contents

1. [System Overview](#System-Overview)
2. [Accessing the System](#accessing-the-system)
3. [Using the Inventory Interface](#using-the-inventory-interface)

   * [Viewing Items](#viewing-items)
   * [Adding a New Item](#adding-a-new-item)
   * [Editing an Existing Item](#editing-an-existing-item)
   * [Deleting an Item](#deleting-an-item)
4. [Troubleshooting](#troubleshooting)

---

## Accessing the System

To access the inventory system, open your browser and navigate to the system URL (e.g., `http://localhost/opensource-final` or your Raspberry Pi's IP address).

### Default Login Credentials

* **Username:** user
* **Password:** user123

If you would like to change the password, you can do so by updating it directly in the `inventory` database using phpMyAdmin or the SQL command line.

---

## Using the Inventory Interface

### Viewing Items

The homepage (`index.php`) displays a table of all current inventory items, including ID, name, quantity, and category (if applicable).

### Adding a New Item

1. Click the **"Add"** button.
2. Fill in the item details (e.g., Remarks, quantity).
3. Click **Submit** to save the new item.

### Editing an Existing Item

1. Locate the item you want to edit in the table.
2. Click the **Edit** icon/button next to it.
3. Modify the item information.
4. Click **Update** to save changes.

### Deleting an Item

1. Find the item you wish to delete.
2. Click the **Delete** icon/button.
3. Confirm the deletion in the prompt dialog.

---

## Troubleshooting

* **Page not loading?** Make sure your device is connected to the local network and the Raspberry Pi is powered on.
* **Error connecting to database?** Contact the system administrator to verify database connectivity.
* **Changes not saving?** Refresh the page and try again, or check for input validation issues.
