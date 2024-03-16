import axios from "axios";

export class ActiveService {
    static serverUrl = import.meta.env.VITE_BASE_URL;

    static getActives(){
        let url = `${this.serverUrl}/actives`;
        return axios.get(url);
    }
    static getById(id){
        let url = `${this.serverUrl}/actives/${id}`;
        return axios.get(url);
    }
    static store(active){
        let url = `${this.serverUrl}/actives`;
        return axios.post(url, active);
    }
    static update(active){
        let url = `${this.serverUrl}/actives/${active.id}`;
        return axios.put(url, active);
    }

    static delete(id){
        let url = `${this.serverUrl}/actives/${id}`;
        return axios.delete(url);
    }


}
