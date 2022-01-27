'use strict';

const e = React.createElement;

class LikeButton extends React.Component {
    constructor(props) {
        super(props);
        this.state = { liked: false };
    }

    render() {
        if (this.state.liked) {
            return 'You liked this.';
        }

        return e(
            'button', { onClick: () => this.setState({ liked: true }) },
            'Like'
        );
    }
}
const contenitoreDom = document.querySelector('#contenitore_bottone_like');
ReactDOM.render(e(LikeButton), contenitoreDom);