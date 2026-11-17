<?php 

namespace Os\Test\Controller;
use Os\Test\Model\Menu as modelMenu;
use Os\Test\View;

class Menu {
    
    private $menu;

    public function __construct() {
        $this->menu = new modelMenu;
    }

    // List all menu items
    public function getMenu() {
        $menus = $this->menu->getAllMenues();
        View::Render('menu.php', ['menus' => $menus]);
    }

    // Show the create item page
    public function makeMenu() {
        View::Render('manage_menu.php');
    }

    // Create a new item
    public function createMenu() {
        $menuData = filter_input_array(INPUT_POST);
        echo $this->menu->create($menuData);
    }

    // Show a single item
    public function viewMenu($id) {
        $menu = $this->menu->getMenuDetail($id);
        View::Render('viewMenu.php', ['menu' => $menu]);
    }

    // Show the edit item page
    public function editMenu($id) {
        $menu = $this->menu->getMenuDetail($id);
        View::Render('editMenu.php', ['menu' => $menu]);
    }

    // Update an item
    public function updateMenu($id) {
        $menuData = filter_input_array(INPUT_POST);
        echo $this->menu->update($menuData, $id);
    }

    // Delete an item
    public function deleteMenu($id) {
        echo $this->menu->delete($id);
    }
}
