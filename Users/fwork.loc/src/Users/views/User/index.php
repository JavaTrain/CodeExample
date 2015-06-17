<div class="conteiner">

<h1>Users list</h1>


<form onsubmit="return false" class="form-inline">

    <label for="selRole">Role</label>
    <select id="selRole">
        <option value="">All</option>
        <option value="student">Student</option>
        <option value="couch">Couch</option>
    </select>

    <label for="selCourse">Course</label>

    <select id="selCourse">
        <option value="">All</option>
        <option value="1">PHP</option>
        <option value="2">JAVA</option>
        <option value="3">C++</option>
    </select>

    <br />
    <br />
    <button class="btn btn-primary">Show</button>

</form>
    <br />
    <br />

    <a href="http://fwork.loc/add/create" class="btn btn-primary">Create user</a>
    <br />
    <br />
    <table id="tableUsers" class="table table-bordered stripy">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Course</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot></tfoot>
        <?php
        foreach($list as $row){
            ?>
            <tbody>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['role']?></td>
                    <td><?=$row['course']?></td>
                    <td><a href="http://fwork.loc/edit/<?=$row['id']?>/update">Edit</a></td>
                    <td><a href="http://fwork.loc/del/<?=$row['id']?>">Delete</a></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>


</div>