<ul class="dropdown">
    <li><a <?php if (isset($semester)){if (($menurow['naam'] == $vakdata['naam']) && ($semester == 2)){ echo "class='active'" ;}} ?>
                    href="semester.php?id=<?= $menurow['vakid']?>&semester=2">Semester 2</a>
    <ul class="sub-dropdown">
            <li><a <?php if (isset($gate)){if (($menurow['naam'] == $vakdata['naam']) && ($gate == 1)){ echo "class='active'" ;}} ?>
                    href="gate.php?id=<?= $menurow['vakid']?>&gate=1">Gate 1</a>
                <ul class="sub-sub-dropdown">
                    <li><a <?php if (isset($sprint)){if (($menurow['naam'] == $vakdata['naam']) && ($sprint == 1)){ echo "class='active'" ;}} ?>
                    href="sprint.php?id=<?= $menurow['vakid']?>&sprint=1">Sprint 1</a></li>

                    <li><a <?php if (isset($sprint)){if (($menurow['naam'] == $vakdata['naam']) && ($sprint == 2)){ echo "class='active'" ;}} ?>
                    href="sprint.php?id=<?= $menurow['vakid']?>&sprint=2">Sprint 2</a></li>

                    <li><a <?php if (isset($sprint)){if (($menurow['naam'] == $vakdata['naam']) && ($sprint == 3)){ echo "class='active'" ;}} ?>
                    href="sprint.php?id=<?= $menurow['vakid']?>&sprint=3">Sprint 3</a></li>

                    <li><a <?php if (isset($sprint)){if (($menurow['naam'] == $vakdata['naam']) && ($sprint == 4)){ echo "class='active'" ;}} ?>
                    href="sprint.php?id=<?= $menurow['vakid']?>&sprint=4">Sprint 4</a></li>

                    <li><a <?php if (isset($sprint)){if (($menurow['naam'] == $vakdata['naam']) && ($sprint == 5)){ echo "class='active'" ;}} ?>
                    href="sprint.php?id=<?= $menurow['vakid']?>&sprint=5">Sprint 5</a></li>
                </ul>
            </li>
        </ul>
    </li>
</ul>