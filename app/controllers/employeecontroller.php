<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\Models\EmployeeModel;

class EmployeeController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction()
    {
        $this->_data['employees'] = EmployeeModel::getAll();
        return $this->_view();
    }

    public function addAction()
    {
        if (isset($_POST['submit'])) {
            $emp = new EmployeeModel();

            $emp->name = $this->filterStr($_POST['name']);
            $emp->age = $this->filterInt($_POST['age']);
            $emp->address = $this->filterStr($_POST['address']);
            $emp->salary = $this->filterFloat($_POST['salary']);
            $emp->tax = $this->filterFloat($_POST['tax']);

            if ($emp->save()) {
                $_SESSION['message'] = 'Employee, saved successfully';
                $this->redirect('/employee');
            }
        }
        $this->_view();
    }

    public function editAction()
    {
        $id = $this->filterInt($this->_params[0]);

        $emp = EmployeeModel::getByPK($id);
        if ($emp === false) {
            $this->redirect('/employee');
        }

        $this->_data['employee'] = $emp;

        if (isset($_POST['submit'])) {
            $emp = new EmployeeModel();

            $emp->name = $this->filterStr($_POST['name']);
            $emp->age = $this->filterInt($_POST['age']);
            $emp->address = $this->filterStr($_POST['address']);
            $emp->salary = $this->filterFloat($_POST['salary']);
            $emp->tax = $this->filterFloat($_POST['tax']);

            if ($emp->save()) {
                $_SESSION['message'] = 'Employee, updated successfully';
                $this->redirect('/employee');
            }
        }
        $this->_view();
    }

    public function deleteAction()
    {
        $id = $this->filterInt($this->_params[0]);

        $emp = EmployeeModel::getByPK($id);
        if ($emp === false) {
            $this->redirect('/employee');
        }

        if ($emp->delete()) {
            $_SESSION['message'] = 'Employee, deleted successfully';
            $this->redirect('/employee');
        }
    }
}