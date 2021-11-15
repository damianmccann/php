<form action="/admin/cake/add" method="POST">

    <input type="text" placeholder="Cake Name" name="cake-name"> 
    <br />
    <textarea placeholder="Description" name="cake-description"></textarea>
    <br />
    <input type="number" placeholder="Price" name="cake-price"> 
    <br />

    <button type="submit">Save</button>

</form>

<div>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
    <?php
        foreach($cakes as $cake) {
    ?>
        <tr>
            <td><?= $cake->name ?></td>
            <td><?= $cake->description ?></td>
            <td><?= $cake->price ?></td>
        </tr>
    <?php
        }
    ?>
    </table>

</div>

