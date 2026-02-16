export default {
    'name':'Usuarios',
    'routes':{
        index:()=>route("users.index"),
        create:()=>route("users.create"),
        store:()=>route("users.create"),
        edit:(id)=>route("users.create",id),
        update:(id)=>route("users.update",id),
        delete:(id)=>route("users.delete",id),
    }
}