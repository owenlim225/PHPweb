echo '<div class='service-item col-md-4 mb-4'>
    <div class='course-card'>
        <div class='course-image-container'>
            <img src='../img/courses/{$row['image']}' alt='{$row['course_title']}' class='course-image'>
        </div>
        
        ' . ($row['is_featured'] ? '<span class='course-badge'>Featured</span>' : '') . '
        
        <div class='course-info p-3'>
            <h5 class='mb-2 text-truncate'>{$row['course_title']}</h5>
            <p class='mb-0 text-muted small'><i class='fas fa-user-tie me-2'></i>{$row['instructor']}</p>
        </div>
        
        <div class='course-card-body'>
            <h5 class='course-title'>{$row['course_title']}</h5>
            <p class='course-instructor'>{$row['instructor']}</p>
            <a href='../func/admin/edit-course.php?course_id={$row['course_id']}' class='edit-button'>
                <span class='edit-icon'>✏️</span> Edit Course
            </a>
        </div>
    </div>
</div>';