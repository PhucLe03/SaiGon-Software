const db = require('../config/db');

class User {
    constructor(username, email, password){
        this.username = username;
        this.email = email;
        this.password = password;
    }

    async save(){
        let d = new Date();
        let yyyy = d.getFullYear();
        let mm = d.getMonth() + 1;
        let dd = d.getDate();

        let createdAtDate = `${yyyy}-${mm}-${dd}`;

        let sql = `
        INSERT INTO user(
            username,
            email,
            password,
            create_time
        )
        VALUES(
            '${this.username}',
            '${this.email}',
            '${this.password}',
            '${createdAtDate}'
        )
        `;

        return await db.execute(sql);
    }


    static findAll(){
        let sql = "SELECT * FROM user;";
        
        return db.execute(sql);
    }

    static findById(MSSV){
        let sql = `SELECT * FROM user WHERE MSSV = ${MSSV}`;
    
        return db.execute(sql);
    }       

}

module.exports = User;