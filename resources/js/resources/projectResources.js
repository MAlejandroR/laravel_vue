export default {
    name: "Proyecto",
    routes:{
        index:()=>route("projects.index"),
        create:()=>route("projects.create"),
        edit:(id)=>route("projects.edit",id),
        destroy:(id)=>route("projects.destroy",id),
        store: () => route("projects.store"),
        update: (id) => route("projects.update", id),
    }
}
