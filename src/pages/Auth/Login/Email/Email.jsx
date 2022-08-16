import React from 'react';
import Input from "../../../../components/UI/Inputs/Input";

const LoginEmail = () => {
    return (
        <div>
            <Input
                type='text'
                placeholder='me@mail.com...'
                icon={'email'}
                visible={false}
                remove={true}
            />
        </div>
    );
};

export default LoginEmail;
