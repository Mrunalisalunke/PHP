<?php

function check_login()
{
    if (!isset($_SESSION) && !isset($_SESSION['user'])) {
        redirect_to('./login.php', ["msg" => "Please Login First!"]);
    }
}



function redirect_to($location, $params = array())
{
    // Append GET parameters if provided
    if (!empty($params)) {
        $location .= '?' . http_build_query($params);
    }

    header("Location: {$location}");
    exit;
}


function get_all_subjects($public = true)
{
    global $conn;
    $query = "SELECT * from subjects ";
    if ($public) {
        $query .= "WHERE visible = 1 ";
    }
    $query .= "ORDER BY position ASC";
    $subjects = $conn->query($query);
    return $subjects;
}

function get_pages_for_subject($subject_id, $public = false)
{
    global $conn;
    $page_query = "SELECT * FROM pages ";
    $page_query .= "WHERE subject_id = {$subject_id} ";
    if ($public) {
        $page_query .= "AND visible = 1 ";
    }
    $page_query .= "ORDER BY position ASC";
    $pages = $conn->query($page_query);
    return $pages;
}

function get_default_page($subject_id)
{
    global $conn;
    $page_query = "SELECT * FROM pages ";
    $page_query .= "WHERE subject_id = {$subject_id} ";
    $page_query .= "AND visible = 1 ";
    $page_query .= "ORDER BY position ASC ";
    $page_query .= "LIMIT 1 ";
    $pages = $conn->query($page_query);
    $page = $pages->fetch_assoc();
    return $page;
}

function get_subject_by_id($subject_id)
{
    global $conn;
    $query = "SELECT * FROM subjects where id = {$subject_id} LIMIT 1";
    $result = $conn->query($query);
    // Will return false if data not found
    return $result->fetch_assoc();
}

function get_page_by_id($page_id)
{
    global $conn;
    $query = "SELECT * FROM pages where id = {$page_id} LIMIT 1";
    $result = $conn->query($query);
    // Will return false if data not found
    return $result->fetch_assoc();
}

function get_selected_page($public = false)
{
    global $sel_subject;
    global $sel_page;
    if (isset($_GET['subj'])) {
        $sel_subject = get_subject_by_id($_GET['subj']);
        if ($public) {
            $sel_page = get_default_page($_GET['subj']);
        }
    } elseif (isset($_GET['page'])) {
        $sel_page = get_page_by_id($_GET['page']);
    }
}

function navigation($sel_subject, $sel_page)
{

    global $sel_subject;
    global $sel_page;

    $output = "<ul class='subjects'>";
    // Database Query
    // Querying subjects
    $subjects = get_all_subjects($public = false);
    if ($subjects->num_rows > 0) {
        while ($subject = $subjects->fetch_assoc()) {
            $class = (isset($sel_subject) && $subject['id'] == $sel_subject['id']) ? "selected" : "";
            $output .= "<li class='{$class}'> <a href='edit_subject.php?subj=" . urlencode($subject['id']) . "'>{$subject["menu_name"]}</a> </li>";

            // Querying Pages in a subject
            $pages = get_pages_for_subject($subject['id'], $public = false);
            $output .= '<ul class="pages">';
            if ($pages->num_rows > 0) {
                while ($page = $pages->fetch_assoc()) {
                    $class = (isset($sel_page) && $page['id'] == $sel_page['id']) ? "selected" : "";
                    $output .= "<li class='{$class}'> <a href='content.php?page=" . urlencode($page['id']) . "'>{$page["menu_name"]}</a> </li>";
                }
            }
            $output .= '</ul>';
        }
    }
    $output .= "</ul>";

    return $output;
}

function public_navigation($sel_subject, $sel_page)
{

    global $sel_subject;
    global $sel_page;

    $output = "<ul class='subjects'>";
    // Database Query
    // Querying subjects
    $subjects = get_all_subjects(true);
    if ($subjects->num_rows > 0) {
        while ($subject = $subjects->fetch_assoc()) {
            // Either a subject is set and selected OR a page is set and selected
            // To highlight subject when pages under it are selected
            $class = (isset($sel_subject) && $subject['id'] == $sel_subject['id'] || isset($sel_page) && $subject['id'] == $sel_page['subject_id']) ? "selected" : "";
            $output .= "<li class='{$class}'> <a href='index.php?subj=" . urlencode($subject['id']) . "'>{$subject["menu_name"]}</a> </li>";

            // Either a subject is set and selected OR a page is set and selected
            if (isset($sel_subject) && $subject['id'] == $sel_subject['id'] || isset($sel_page) && $subject['id'] == $sel_page['subject_id']) {
                // Querying Pages in a subject
                $pages = get_pages_for_subject($subject['id'], true);
                $output .= '<ul class="pages">';
                if ($pages->num_rows > 0) {
                    while ($page = $pages->fetch_assoc()) {
                        $class = ($page['id'] == $sel_page['id']) ? "selected" : "";
                        $output .= "<li class='{$class}'> <a href='index.php?page=" . urlencode($page['id']) . "'>{$page["menu_name"]}</a> </li>";
                    }
                }
                $output .= '</ul>';
            }
        }
    }
    $output .= "</ul>";

    return $output;
}
