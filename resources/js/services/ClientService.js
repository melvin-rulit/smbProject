import axios from "axios";

export class ClientService {
    static serverUrl = import.meta.env.VITE_BASE_URL;

    static getClients(query){
        let url = `${this.serverUrl}/clients`;
        return axios.get(url, {"params": {"query": query}});
    }
    static store(client) {
        let url = `${this.serverUrl}/clients`;
        return axios.post(url, client)
    }

    static getById(id){
        let url = `${this.serverUrl}/clients/${id}`;
        return axios.get(url);
    }

    static update(client){
        let url = `${this.serverUrl}/clients/${client.id}`;
        return axios.put(url, client);
    }

    static delete(id) {
        let url = `${this.serverUrl}/clients/${id}`;
        return axios.delete(url, id)
    }
}
