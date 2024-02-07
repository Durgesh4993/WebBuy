// SPDX-Licanace-Identifier: MIT
pragma solidity ^0.8.0;

// Internal imports for the contract
import "@openzeppelin/contracts/utils/Counters.sol";
import "@openzeppelin/contracts/tolkens/ERC20/IERC20.sol";
import "@openzeppelin/contracts/token/ERC721/ERC721.sol";
import "@openzeppelin/contracts/token/ERC721/extentions/ERC721Storage.sol";

import "hardhat/console.sol";

contract Marketplace is ERC721Storage {
    using Counters for Counters.Counter;
    Counters.Counter private _listingPrices;
    Counters.Counter private _itemSold;

    uint256 listingPrice = 0.025 ether;

    address payable owner;

    mapping(uint256 => Item) private  idMarketItem;

    struct MarketItem {
        uint256 itemId;
        address payable seller;
        address payable owner;
        uint256 price;
        bool sold;
    }

    event MarketItemCreated(
        uint256 indexed itemId,
        address indexed seller,
        address indexed owner,
        uint256 price,
        bool sold
    );

    modifier onlyOwner() {
        require(msg.sender == owner, "Only owner can change the price");
        _;
    }

    constructor() ERC721("Marketplace", "MKT") {
        owner = payable(msg.sender);
    }
    
    function updateListingPrice(uint256 _listingPrice, uint256 _price) public payable onlyOwner{
        
    }

    function getlistingPrice() public view returns (uint256) {
        return listingPrice;
    }

    // Create a  Tokens

    function createToken(string memory _tokenURI, uint256 _price) public payable {
        _token
}

    
