const setPermissions = document.getElementById('setPermissions');
const btnPermissions = document.querySelectorAll('input[name="is_restricted"]');
btnPermissions.forEach(btnPermission => {
    btnPermission.addEventListener('change', e => {
        const btnPermissionValue = e.target.value;
        if (btnPermissionValue == 'Y') {
            setPermissions.classList.remove('d-none');
        }
        else {
            setPermissions.classList.add('d-none');
        }
    });
});

function groupSwitched(isChecked, key) {
    const childrens = document.querySelectorAll('input[data-group="' + key + '"]');
    childrens.forEach(children => {
        if (isChecked) {
            children.checked = true;
        }
        else {
            children.checked = false;
        }
    });
}

function subgroupSwitched(isChecked, key, group) {
    const childrens = document.querySelectorAll('input[data-subgroup="' + key + '"]');
    childrens.forEach(children => {
        if (isChecked) {
            children.checked = true;
        }
        else {
            children.checked = false;
        }
    });

    const parents = document.querySelectorAll('input[data-type="group"][data-key="' + group + '"]');
    const subgroups = document.querySelectorAll('input[data-type="subgroup"][data-group="' + group + '"]').length;
    const subgroupsChecked = document.querySelectorAll('input[data-type="subgroup"][data-group="' + group + '"]:checked').length;
    parents.forEach(parent => {
        if (subgroups == subgroupsChecked) {
            parent.checked = true;
        }
        else {
            parent.checked = false;
        }
    });
}

function permissionSwitched(isChecked, subgroup, group) {
    const subgroupParents = document.querySelectorAll('input[data-type="subgroup"][data-key="' + subgroup + '"]');
    const subgroupPermissions = document.querySelectorAll('input[data-type="permission"][data-subgroup="' + subgroup + '"]').length;
    const subgroupPermissionsChecked = document.querySelectorAll('input[data-type="permission"][data-subgroup="' + subgroup + '"]:checked').length;
    subgroupParents.forEach(subgroupParent => {
        if (subgroupPermissions == subgroupPermissionsChecked) {
            subgroupParent.checked = true;
        }
        else {
            subgroupParent.checked = false;
        }
    });

    const groupParents = document.querySelectorAll('input[data-type="group"][data-key="' + group + '"]');
    const groupPermissions = document.querySelectorAll('input[data-type="permission"][data-group="' + group + '"]').length;
    const groupPermissionsChecked = document.querySelectorAll('input[data-type="permission"][data-group="' + group + '"]:checked').length;
    groupParents.forEach(groupParent => {
        if (groupPermissions == groupPermissionsChecked) {
            groupParent.checked = true;
        }
        else {
            groupParent.checked = false;
        }
    });
}

const switchGroups = document.querySelectorAll('input[data-type="group"]');
switchGroups.forEach(switchGroup => {
    switchGroup.addEventListener('change', e => {
        const isChecked = e.target.checked;
        const key = e.target.dataset.key;
        groupSwitched(isChecked, key);
    });
});

const switchSubgroups = document.querySelectorAll('input[data-type="subgroup"]');
switchSubgroups.forEach(switchSubgroup => {
    switchSubgroup.addEventListener('change', e => {
        const isChecked = e.target.checked;
        const key = e.target.dataset.key;
        const group = e.target.dataset.group;
        subgroupSwitched(isChecked, key, group);
    });
});

const switchPermissions = document.querySelectorAll('input[data-type="permission"]');
switchPermissions.forEach(switchPermission => {
    switchPermission.addEventListener('change', e => {
        const isChecked = e.target.checked;
        const subgroup = e.target.dataset.subgroup;
        const group = e.target.dataset.group;
        permissionSwitched(isChecked, subgroup, group);
    });
});