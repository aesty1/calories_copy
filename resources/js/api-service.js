
export default class ApiService {
    _base_url = window.location.origin + `/api`;
    
    async getResource(url, type, id) {
        let response = await fetch(`${this._base_url}${url}`);
        let result = await response.json();
        return result.data[type][id];
    }
    async getsomethink(something, type, id) {
        const res = await this.getResource(`/${something}`,type ,id);
        return this[`_get${something}`](res);
    }
    async createsomething(something, name, carbohydrates, fats, protein, calories, type="") {
        let data = {
            name: name,
            carbohydrates: carbohydrates,
            fats: fats,
            protein: protein,
            calories: calories
        }
        let postData = {
            method: 'POST',
            body: data,
            headers: {
                "Content-Type":"application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            }
        }
        
        let response = await fetch(`${this._base_url}/user/${something}?name=${name}&carbohydrates=${carbohydrates}&fats=${fats}&protein=${protein}&calories=${calories}`, postData);
        let result = await response.json();
        return result;
    }
    async deletesomething(something, id) {
        let postData = {
            method: 'DELETE'
        }
        let response = await fetch(`${this._base_url}/user/${something}/${id}`, postData);
        if(response.ok) {
            console.log(response)
        };
        let result = await response.json();
        return result;
    }
    _getproducts(product) { 
        return {
            user_id: product.user_id,
            name: product.name,
            calories: product.calories,
            carbohydrates: product.carbohydrates,
            protein: product.protein,
            fats: product.fats,
            created_at: product.created_at,
            updated_at: product.updated_at
        }
    }
    
    
}